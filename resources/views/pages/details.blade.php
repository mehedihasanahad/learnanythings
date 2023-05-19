@extends('layout.layout')
@section('title', $title)
@section('pages')
    @php
        $template_type = 'list';
    @endphp
    <div class="mt-10">
        @if($template_type === 'list')
            @includeIf('subviews.template.list')
        @else
            @includeIf('subviews.template.default')
        @endif
    </div>
@endsection
