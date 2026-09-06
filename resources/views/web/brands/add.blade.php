@extends ('layouts.admin-dashboard')

@section ('content')
    <form
        action="{{ route('brands.store') }}"
        method="POST"
    >
        @csrf
        <div class="max-w-md">
            @include ('partials.sub-views.input', [
                'label' => 'Name',
                'name' => 'name',
                'value' => old('name'),
                'error' => $errors->first('name'),
            ])

            @include ('partials.sub-views.input', [
                'label' => 'Slug',
                'name' => 'slug',
                'value' => old('slug'),
                'error' => $errors->first('slug')
            ])

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
                >
                    Add Brand
                </button>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="m-4 rounded-b-md bg-green-200 text-green-600">
            {{session('success')}}
        </div>
    @endif
@endsection
