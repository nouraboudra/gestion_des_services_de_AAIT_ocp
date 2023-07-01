<div class="card-body">
    <div class="row">
        <div class="col">
            <div class="demo-inline-spacing center">
                <!-- Basic Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="tf-icon bx bx-chevrons-left"></i></span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i
                                        class="tf-icon bx bx-chevron-left"></i></a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled">
                                    <span class="page-link">{{ $element }}</span>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i
                                        class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link"><i class="tf-icon bx bx-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!--/ Basic Pagination -->
            </div>
        </div>
    </div>
</div>
