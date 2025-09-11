@if ($paginator->hasPages())
  <ul class="pagination">
  	@if ($paginator->onFirstPage()) 
    <li class="page-item disabled">
      <a class="" href="#" tabindex="-1">Previous</a>
    </li>
    @else
    <li class="page-item">
      <a class="" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">Previous</a>
    </li>
    @endif
    
    @foreach ($elements as $element)
    @if(is_string($element))
    <li class="page-item disabled"><span>{{ $element }}</span></li>
    @endif
    @if(is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active">
                <span class="page-link">{{ $page }}</span>
            </li>
            @else
                <li class="page-item"><a class="" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach
    @endif    
    @endforeach
    
    @if ($paginator->hasMorePages()) 
    <li class="page-item">
      <a class="" href="{{ $paginator->nextPageUrl() }}">Next</a>
    </li>
	@else
    <li class="disabled page-item">
      <a class="" href="#">Next</a>
    </li>
    @endif
  </ul>
@endif