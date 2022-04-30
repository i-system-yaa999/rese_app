@props([
'method' => 'POST'
])
@php
$method = strtoupper($method);
@endphp

<form {{ $attributes->merge(['method' => $method === 'GET' ? 'GET' : 'POST']) }}>
  @if ($method !== 'GET')
  @csrf
  @endif

  @if ($method !== 'GET' && $method !== 'POST')
  @method($method)
  @endif

  {{ $slot }}
</form>