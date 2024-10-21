@if (isset($paginator) && $paginator->lastPage() > 1)
    <div class="d-md-flex align-items-center">
        <div class="me-md-auto text-md-left text-center mb-2 mb-md-0">
            Showing {{ $paginator->currentPage() }} to {{ $paginator->items() }} of {{ $paginator->total() }} entries
        </div>
        <ul class="pagination mb-0 justify-content-center">
            @php
                $interval = isset($interval) ? abs(intval($interval)) : 3 ;
                $from = $paginator->currentPage() - $interval;
                if($from < 1){
                  $from = 1;
                }

                $to = $paginator->currentPage() + $interval;
                if($to > $paginator->lastPage()){
                  $to = $paginator->lastPage();
                }
            @endphp
            @if($paginator->currentPage() > 1)
                <li class="page-item"><a href="{{ $paginator->url(1) }}" class="page-link">First</a></li>
                <li class="page-item"><a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="page-link">Previous</a></li>
            @endif
            @for($i = $from; $i <= $to; $i++)
                @php
                    $isCurrentPage = $paginator->currentPage() == $i;
                @endphp
                <li class="{{ $isCurrentPage ? 'active' : '' }}">
                    <a >
                        {{ $i }}
                    </a>
                </li>
                <li class="page-item {{ $isCurrentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}">{{ $i }}</a>
                </li>
            @endfor

            @if($paginator->currentPage() < $paginator->lastPage())
                 <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}">Next</a></li>
                 <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastpage()) }}" >Last</a></li>
            @endif
        </ul>
    </div>
@endif
