window.alertDialog = function () {
    return {
        open: false,
        previousActiveElement: null,
        openDialog() {
            this.previousActiveElement = document.activeElement;
            this.open = true;
            this.$nextTick(() => {
                if (this.$refs.cancel) {
                    this.$refs.cancel.focus();
                    return;
                }

                this.firstFocusable()?.focus();
            });
        },
        closeDialog() {
            this.open = false;
            this.$nextTick(() => {
                this.previousActiveElement?.focus?.();
            });
        },
        firstFocusable() {
            return this.focusableElements()[0] ?? null;
        },
        focusableElements() {
            return Array.from(
                this.$refs.content?.querySelectorAll(
                    [
                        "a[href]",
                        "button:not([disabled])",
                        "textarea:not([disabled])",
                        "input:not([disabled])",
                        "select:not([disabled])",
                        '[tabindex]:not([tabindex="-1"])',
                    ].join(","),
                ) ?? [],
            );
        },
        trapFocus(event) {
            const focusable = this.focusableElements();

            if (!focusable.length) {
                event.preventDefault();
                return;
            }

            const first = focusable[0];
            const last = focusable[focusable.length - 1];

            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault();
                first.focus();
            }
        },
    };
};
