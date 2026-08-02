@props([
    'title' => null,
    'searchPlaceholder' => __('Search tasks, pipelines, users...'),
])

@php
    $user = auth()->user();
    $userName = $user?->name ?? 'Jane Doe';
    $userEmail = $user?->email ?? 'jane@example.com';
    $initials = collect(explode(' ', trim($userName)))
        ->filter()
        ->map(fn ($part) => mb_substr($part, 0, 1))
        ->take(2)
        ->implode('');

    $dashboardHref = \Illuminate\Support\Facades\Route::has('dashboard') ? route('dashboard') : url('/');
    $navItems = $adminNav ?? [
        ['label' => __('Dashboard'), 'icon' => 'layout-grid', 'href' => $dashboardHref, 'active' => request()->routeIs('dashboard')],
        ['label' => __('Manage'), 'icon' => 'list-bullet', 'href' => '#', 'active' => true],
        ['label' => __('Monitor'), 'icon' => 'chart-bar', 'href' => '#', 'active' => false],
        ['label' => __('Connections'), 'icon' => 'link', 'href' => '#', 'active' => false],
        ['label' => __('Admin'), 'icon' => 'user-circle', 'href' => '#', 'active' => false],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full overflow-hidden" style="margin: 0;">
    <head>
        @include('partials.head')
    </head>
    <body class="h-full overflow-hidden bg-[#e9ecef] text-[#2f373d] antialiased" style="margin: 0;">
        <div class="h-full overflow-hidden lg:flex">
            <aside class="fixed inset-y-0 left-0 z-40 hidden w-64 border-r border-[#dce2e6] bg-white shadow-[0_18px_40px_rgba(41,54,64,0.08)] lg:flex lg:flex-col">
                <a href="{{ $dashboardHref }}" class="flex h-20 items-center bg-[#0ca463] px-8 text-white">
                    <span class="text-2xl font-light tracking-normal">TECH</span>
                    <span class="ml-2 text-2xl font-bold tracking-normal">ASAP</span>
                </a>

                <nav class="flex-1 space-y-2 px-4 py-6">
                    @foreach ($navItems as $item)
                        <a
                            href="{{ $item['href'] }}"
                            @class([
                                'flex h-11 items-center gap-3 rounded-md px-4 text-sm font-medium transition',
                                'bg-[#eaf8f1] text-[#0ca463]' => $item['active'],
                                'text-[#3f4a51] hover:bg-[#f3f6f7] hover:text-[#0ca463]' => ! $item['active'],
                            ])
                        >
                            <flux:icon :name="$item['icon']" class="size-4" />
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>

                <div class="border-t border-[#edf0f2] px-6 py-5">
                    <div class="text-xs font-medium uppercase tracking-[0.12em] text-[#98a1a7]">{{ __('Status') }}</div>
                    <div class="mt-3 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-full bg-[#eaf8f1] text-sm font-bold text-[#0ca463]">{{ $initials }}</span>
                        <div class="min-w-0">
                            <div class="truncate text-sm font-semibold text-[#2f373d]">{{ $userName }}</div>
                            <div class="truncate text-xs text-[#7f8a91]">{{ $userEmail }}</div>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="fixed inset-0 flex min-w-0 flex-1 flex-col overflow-hidden lg:left-64" style="--admin-header-height: 80px; --admin-footer-height: 64px;">
                <header class="z-30 h-[var(--admin-header-height)] flex-none border-b border-[#dce2e6] bg-white/95 shadow-[0_6px_22px_rgba(41,54,64,0.05)] backdrop-blur">
                    <div class="flex h-full items-center gap-4 px-4 sm:px-6 lg:px-8">
                        <details class="group relative lg:hidden">
                            <summary class="flex size-10 cursor-pointer list-none items-center justify-center rounded-md border border-[#dce2e6] text-[#3f4a51]">
                                <flux:icon name="bars-3" class="size-5" />
                            </summary>
                            <div class="absolute left-0 top-12 w-72 rounded-md border border-[#dce2e6] bg-white p-3 shadow-xl">
                                <div class="mb-3 flex h-12 items-center rounded-md bg-[#0ca463] px-4 text-white">
                                    <span class="text-lg font-light">TECH</span>
                                    <span class="ml-1.5 text-lg font-bold">ASAP</span>
                                </div>
                                <nav class="space-y-1">
                                    @foreach ($navItems as $item)
                                        <a
                                            href="{{ $item['href'] }}"
                                            @class([
                                                'flex h-10 items-center gap-3 rounded-md px-3 text-sm font-medium',
                                                'bg-[#eaf8f1] text-[#0ca463]' => $item['active'],
                                                'text-[#3f4a51]' => ! $item['active'],
                                            ])
                                        >
                                            <flux:icon :name="$item['icon']" class="size-4" />
                                            <span>{{ $item['label'] }}</span>
                                        </a>
                                    @endforeach
                                </nav>
                            </div>
                        </details>

                        <div class="hidden text-xs font-medium text-[#8b959b] sm:block">{{ __('Manage') }}</div>

                        <form action="{{ $searchAction ?? '#' }}" method="GET" class="min-w-0 flex-1">
                            <label for="admin-dashboard-search" class="sr-only">{{ __('Search') }}</label>
                            <div class="relative mx-auto max-w-2xl">
                                <input
                                    id="admin-dashboard-search"
                                    name="search"
                                    type="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ $searchPlaceholder }}"
                                    class="h-11 w-full rounded-md border border-[#dce2e6] bg-[#f8fafb] pl-4 pr-11 text-sm text-[#2f373d] outline-none transition placeholder:text-[#9aa3a9] focus:border-[#0ca463] focus:bg-white focus:ring-4 focus:ring-[#0ca463]/10"
                                >
                                <button type="submit" class="absolute right-1.5 top-1.5 flex size-8 items-center justify-center rounded-md text-[#53616a] transition hover:bg-[#eaf8f1] hover:text-[#0ca463]" aria-label="{{ __('Search') }}">
                                    <flux:icon name="magnifying-glass" class="size-4" />
                                </button>
                            </div>
                        </form>

                        <div class="hidden items-center gap-3 sm:flex">
                            <button type="button" class="flex h-8 w-14 items-center rounded-full border border-[#dce2e6] bg-white px-1" aria-label="{{ __('Toggle appearance') }}">
                                <span class="size-5 rounded-full bg-[#0ca463]"></span>
                                <span class="ml-auto size-3 rounded-full bg-[#ffd24a]"></span>
                            </button>
                            <button type="button" class="relative flex size-10 items-center justify-center rounded-md text-[#3f4a51] hover:bg-[#f3f6f7]" aria-label="{{ __('Notifications') }}">
                                <flux:icon name="bell" class="size-5" />
                                <span class="absolute right-2.5 top-2.5 size-2 rounded-full bg-[#0ca463]"></span>
                            </button>
                            <button type="button" class="flex items-center gap-2 rounded-md px-2 py-1.5 text-sm text-[#53616a] hover:bg-[#f3f6f7]">
                                <span class="flex size-8 items-center justify-center rounded-full bg-[#1f2933] text-xs font-bold text-white">{{ $initials }}</span>
                                <span class="hidden max-w-28 truncate lg:block">{{ $userName }}</span>
                                <flux:icon name="chevron-down" class="size-4" />
                            </button>
                        </div>
                    </div>
                </header>

                <main class="min-w-0 flex-none overflow-y-auto overscroll-contain px-4 py-7 sm:px-6 lg:px-8" style="height: calc(100vh - var(--admin-header-height) - var(--admin-footer-height));">
                    @isset($slot)
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endisset
                </main>

                <footer class="flex h-[var(--admin-footer-height)] flex-none flex-wrap items-center justify-center border-t border-[#dce2e6] px-4 text-center text-xs text-[#6f7a82] sm:px-6 lg:px-8">
                    {{ __('Copyright 2022 pingahla, Inc.') }}
                    <span class="mx-2 text-[#aeb6bb]">|</span>
                    {{ __('Terms of Use') }}
                    <span class="mx-2 text-[#aeb6bb]">|</span>
                    {{ __('Privacy Policy') }}
                    <span class="mx-2 text-[#aeb6bb]">|</span>
                    {{ __('Blog') }}
                    <span class="mx-2 text-[#aeb6bb]">|</span>
                    {{ __('Documentation') }}
                    <span class="mx-2 text-[#aeb6bb]">|</span>
                    {{ __('Community') }}
                    <span class="mx-2 text-[#aeb6bb]">|</span>
                    {{ __('Feedback') }}
                </footer>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
