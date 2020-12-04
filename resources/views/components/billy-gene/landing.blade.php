<x-bootstrap-page>
    <x-form-errors :errors="$errors"></x-form-errors>
    <x-slot name='pageTitle'>{{$title}}</x-slot>
    <x-billy-gene.landing.layout :property="$property"></x-billy-gene.landing.layout>
</x-bootstrap-page>