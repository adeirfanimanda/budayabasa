@extends('layouts.main.index')
@section('container')

@section('style')
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        @media screen and (min-width: 1320px) {
            #search {
                width: 250px;
            }
        }

        @media screen and (max-width: 575px) {
            .pagination-mobile {
                display: flex;
                justify-content: end;
            }
        }
    </style>
@endsection
<div class="row">
    <div class="col-md-12 col-lg-12 order-2 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between" style="margin-bottom: -0.7rem;">
                <div class="justify-content-end">
                    <form action="/materi/search">
                        <div class="input-group">
                            <input type="search" class="form-control" value="{{ request('q') }}" name="q"
                                id="search" style="border: 1px solid #d9dee3;" placeholder="Cari Materi..."
                                autocomplete="off" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    <div class="table-responsive text-nowrap" style="border-radius: 3px;">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-white">No</th>
                                    <th class="text-white">Judul Materi</th>
                                    <th class="text-white">Deskripsi</th>
                                    <th class="text-white text-center">Dokumen</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($materials as $index => $material)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if (preg_match('/[\x{0000}-\x{007F}]/u', $material->title))
                                            <td>{{ Str::limit($material->title, 40, '...') }}</td>
                                        @else
                                            <td style="font-size: 18px;">
                                                {{ Str::limit($material->title, 31, '...') }}
                                            </td>
                                        @endif
                                        <td>{{ Str::limit($material->description, 50, '...') }}</td>
                                        <td class="text-center">
                                            <a href="{{ asset('storage/' . $material->document) }}"
                                                class="btn btn-primary btn-sm" role="button" target="_blank">
                                                <span class="tf-icons bx bx-download" style="font-size: 15px;"></span>
                                                Unduh
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($materials->isEmpty())
                                    <tr>
                                        <td colspan="100" class="text-center">
                                            Data materi tidak ditemukan dengan keyword pencarian:
                                            <b>"{{ request('q') }}"</b>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </ul>
                @if (!$materials->isEmpty())
                    <div class="mt-3 pagination-mobile">
                        {{ $materials->withQueryString()->onEachSide(1)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('assets/js/materi/index.js') }}"></script>
@endsection
@endsection
