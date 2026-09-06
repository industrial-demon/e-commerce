import {
    autoUpdate,
    computePosition,
    flip,
    offset,
    shift,
} from "@floating-ui/dom";

window.dropdownMenu = function () {
    return {
        open: false,
        activeIndex: -1,
        cleanupFloating: null,
        floatingStyle: "position: fixed; top: 0px; left: 0px;",
        floatingOptions: {
            side: "bottom",
            align: "end",
            sideOffset: 8,
            collisionPadding: 8,
        },
        init() {
            this.$watch("open", (open) => {
                if (open) {
                    this.$nextTick(() => this.startFloating());
                } else {
                    this.stopFloating();
                }
            });
        },
        destroy() {
            this.stopFloating();
        },
        setFloatingOptions(options) {
            this.floatingOptions = { ...this.floatingOptions, ...options };
        },
        items() {
            return Array.from(
                this.$refs.content?.querySelectorAll(
                    "[data-dropdown-menu-item]:not([aria-disabled=true])",
                ) ?? [],
            );
        },
        openMenu() {
            this.open = true;
        },
        closeMenu(focusTrigger = true) {
            this.open = false;
            this.activeIndex = -1;

            if (focusTrigger) {
                this.$nextTick(() => this.$refs.trigger?.focus());
            }
        },
        toggleMenu() {
            this.open ? this.closeMenu() : this.openMenu();
        },
        startFloating() {
            this.stopFloating();
            this.positionMenu();

            if (!this.$refs.trigger || !this.$refs.content) {
                return;
            }

            this.cleanupFloating = autoUpdate(
                this.$refs.trigger,
                this.$refs.content,
                () => this.positionMenu(),
            );
        },
        stopFloating() {
            this.cleanupFloating?.();
            this.cleanupFloating = null;
        },
        positionMenu() {
            const trigger = this.$refs.trigger;
            const content = this.$refs.content;

            if (!trigger || !content) {
                return;
            }

            const placement =
                this.floatingOptions.align === "center"
                    ? this.floatingOptions.side
                    : `${this.floatingOptions.side}-${this.floatingOptions.align}`;

            computePosition(trigger, content, {
                placement,
                strategy: "fixed",
                middleware: [
                    offset(
                        Number.parseFloat(this.floatingOptions.sideOffset) || 0,
                    ),
                    flip(),
                    shift({
                        padding:
                            Number.parseFloat(
                                this.floatingOptions.collisionPadding,
                            ) || 8,
                    }),
                ],
            }).then(({ x, y }) => {
                this.floatingStyle = `position: fixed; left: ${x}px; top: ${y}px;`;
            });
        },
        focusItem(index) {
            const items = this.items();

            if (!items.length) {
                return;
            }

            this.activeIndex = (index + items.length) % items.length;
            items[this.activeIndex].focus();
        },
        focusFirst() {
            this.focusItem(0);
        },
        focusLast() {
            this.focusItem(this.items().length - 1);
        },
        focusNext() {
            this.focusItem(this.activeIndex + 1);
        },
        focusPrevious() {
            this.focusItem(this.activeIndex - 1);
        },
    };
};
