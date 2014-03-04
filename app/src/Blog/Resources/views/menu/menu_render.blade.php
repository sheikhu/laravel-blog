@if ($item->hasChildren() && 0 !== $options['depth'] && $item->getDisplayChildren())

<ul {{ $renderer->renderHtmlAttributes($item->getAttributes() ) }}>
    {{ $renderer->renderChildren($item, $options) }}
</ul>

@endif

