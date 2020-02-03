@foreach ($nonConformities as $nonConformities)

{{$nonConformities->date}}
    @if ($nonConformities->date == null)
        {{"nodate"}}
    @else
        {{"present dara"}}
    @endif
@endforeach

