@extends ('layouts.admin-dashboard')

@section ('content')
    <x-table title="Brands">
        <x-table.head>
            <x-table.th sortable>Name</x-table.th>
            <x-table.th sortable>Slug</x-table.th>
            <x-table.th sortable>Created</x-table.th>
            <x-table.th
                align="center"
                width="96px"
            >
                Action
            </x-table.th>
        </x-table.head>

        <x-table.body>
            @forelse ($brands as $brand)
                <x-table.row>
                    <x-table.td>{{ $brand->name }}</x-table.td>
                    <x-table.td>{{ $brand->slug }}</x-table.td>
                    <x-table.td>
                        {{ optional($brand->created_at)->format('Y-m-d') }}
                    </x-table.td>
                    <x-table.td
                        align="center"
                        :truncate="false"
                    >
                        <x-dropdown-menu>
                            <x-dropdown-menu.trigger label="Brand actions">
                                <flux:icon
                                    name="ellipsis-horizontal"
                                    class="size-4"
                                />
                            </x-dropdown-menu.trigger>

                            <x-dropdown-menu.content align="end">
                                <x-dropdown-menu.label>
                                    Brand
                                </x-dropdown-menu.label>
                                <x-dropdown-menu.item
                                    :href="route('brands.edit', $brand)"
                                    icon="pencil-square"
                                >
                                    Edit
                                </x-dropdown-menu.item>
                                <x-dropdown-menu.separator />
                                <x-alert-dialog>
                                    <x-alert-dialog.trigger
                                        role="menuitem"
                                        tabindex="-1"
                                        data-dropdown-menu-item
                                        class="flex w-full items-center gap-2 rounded px-2.5 py-2 text-left text-xs font-medium text-[#b42318] transition outline-none hover:bg-[#fff1f0] focus:bg-[#fff1f0]"
                                    >
                                        <flux:icon
                                            name="trash"
                                            class="size-4"
                                        />
                                        Delete
                                    </x-alert-dialog.trigger>

                                    <x-alert-dialog.content>
                                        <form
                                            action="{{ route('brands.destroy', $brand) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method ('DELETE')

                                            <x-alert-dialog.title>
                                                Delete brand?
                                            </x-alert-dialog.title>
                                            <x-alert-dialog.description>
                                                This will permanently delete {{ $brand->name }}.
                                                This action cannot be undone.
                                            </x-alert-dialog.description>

                                            <x-alert-dialog.footer>
                                                <x-alert-dialog.cancel>
                                                    Cancel
                                                </x-alert-dialog.cancel>
                                                <x-alert-dialog.action
                                                    type="submit"
                                                >
                                                    Delete
                                                </x-alert-dialog.action>
                                            </x-alert-dialog.footer>
                                        </form>
                                    </x-alert-dialog.content>
                                </x-alert-dialog>
                            </x-dropdown-menu.content>
                        </x-dropdown-menu>
                    </x-table.td>
                </x-table.row>
            @empty
                <x-table.empty
                    :columns="4"
                    message="No brands found."
                />
            @endforelse
        </x-table.body>

        <x-slot:footer>
            <x-table.footer
                :summary="'Showing '.($brands->firstItem() ?? 0).' to '.($brands->lastItem() ?? 0).' of '.$brands->total().' results'"
            >
                <x-table.pagination :paginator="$brands" />
            </x-table.footer>
        </x-slot:footer>
    </x-table>
@endsection
