@if ($paginator->getLastPage() > 1)
<ul class="pager">

  <li class="previous {{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}">
    @if($paginator->getCurrentPage() == 1)
    <a href="#">
      <i class="icon left arrow"></i> Previous
    </a>
    @else
    <a href="{{ $paginator->getUrl(1) }}">
      <i class="icon left arrow"></i> Previous
    </a>
    @endif
  </li>

  <li class="next {{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">
    @if($paginator->getCurrentPage() == $paginator->getLastPage())
    <a href="#">
      Next <i class="icon right arrow"></i>
    </a>
    @else
    <a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}">
      Next <i class="icon right arrow"></i>
    </a>
    @endif
  </li>


</ul>
@endif
