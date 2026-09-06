@props ([
    'paginator' => null,
    'window' => 2,
])

@if ($paginator && method_exists($paginator, 'links'))
    {{ $paginator->onEachSide($window)->links('partials.sub-views.table.pagination') }}
@endif
