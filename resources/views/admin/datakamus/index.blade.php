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

        .required-label::after {
            content: " *";
            color: red;
        }

        @media screen and (max-width: 575px) {
            .pagination-mobile {
                display: flex;
                justify-content: end;
            }
        }

        audio {
            height: 35px;
            outline: none;
        }

        audio::-webkit-media-controls-panel {
            background-color: #f1f1f1;
            color: #333;
            border-radius: 8px;
            padding: 0px;
        }

        audio::-webkit-media-controls-play-button,
        audio::-webkit-media-controls-pause-button {
            background-color: #696cff;
            color: #fff;
            border-radius: 50%;
            padding: 0px;
            border: none;
            cursor: pointer;
        }
    </style>
@endsection
<div class="flash-message"
    data-add-dictionary="@if (session()->has('addDictionarySuccess')) {{ session('addDictionarySuccess') }} @endif"
    data-edit-dictionary="@if (session()->has('editDictionarySuccess')) {{ session('editDictionarySuccess') }} @endif"
    data-delete-dictionary="@if (session()->has('deleteDictionarySuccess')) {{ session('deleteDictionarySuccess') }} @endif">
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 order-2 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between" style="margin-bottom: -0.7rem;">
                <div class="justify-content-start">
                    <button type="button" class="btn btn-xs btn-dark fw-bold p-2 buttonAddDictionary"
                        data-bs-toggle="modal" data-bs-target="#formModalAdminDictionary"
                        style="border-radius: 0.375rem;">
                        <i class='bx bx-book fs-6'></i>&nbsp;TAMBAH KAMUS
                    </button>
                </div>
                <div class="justify-content-end">
                    <form action="/admin/data-kamus/search">
                        <div class="input-group">
                            <input type="search" class="form-control" name="q" id="search"
                                style="border: 1px solid #d9dee3;" placeholder="Cari Data Kamus..."
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
                                    <th class="text-white">Ngoko</th>
                                    <th class="text-white">Krama</th>
                                    <th class="text-white">Bahasa Indonesia</th>
                                    <th class="text-white">Contoh Kalimat</th>
                                    <th class="text-white text-center">Kategori</th>
                                    <th class="text-white text-center">Audio</th>
                                    <th class="text-white">Tanggal Pembuatan</th>
                                    <th class="text-white">Tanggal Update</th>
                                    <th class="text-white text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($dictionaries as $index => $dictionary)
                                    <tr>
                                        <td>{{ $dictionaries->firstItem() + $index }}</td>
                                        <td class="text-capitalize">{{ $dictionary->ngoko }}</td>
                                        <td class="text-capitalize">{{ $dictionary->krama }}</td>
                                        <td class="text-capitalize">{{ $dictionary->indonesian }}</td>
                                        <td class="text-capitalize">
                                            {{ $dictionary->example ? Str::limit($dictionary->example, 50, '...') : 'Tidak Ada Contoh Kalimat' }}
                                        </td>
                                        <td class="text-center">
                                            @if ($dictionary->category == 'huruf')
                                                <span class="badge bg-label-success fw-bold">{{ 'Huruf' }}</span>
                                            @elseif ($dictionary->category == 'angka')
                                                <span class="badge bg-label-info fw-bold">{{ 'Angka' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($dictionary->audio)
                                                <audio controls>
                                                    <source
                                                        src="@if (Storage::disk('public')->exists($dictionary->audio)) {{ asset('storage/' . $dictionary->audio) }} @else {{ asset('assets/' . $dictionary->audio) }} @endif"
                                                        type="audio/mpeg">
                                                </audio>
                                            @else
                                                Tidak Ada Audio
                                            @endif
                                        </td>
                                        <td>
                                            {{ $dictionary->created_at->locale('id')->isoFormat('D MMMM YYYY | H:mm') }}
                                        </td>
                                        <td>
                                            {{ $dictionary->updated_at->locale('id')->isoFormat('D MMMM YYYY | H:mm') }}
                                        </td>
                                        <td class="text-center">
                                            <button type="button"
                                                class="btn btn-icon btn-primary btn-sm buttonEditDictionary"
                                                data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="auto" title="Edit Kamus"
                                                data-code-dictionary="{{ encrypt($dictionary->id) }}"
                                                data-ngoko-dictionary="{{ $dictionary->ngoko }}"
                                                data-krama-dictionary="{{ $dictionary->krama }}"
                                                data-indonesian-dictionary="{{ $dictionary->indonesian }}"
                                                data-example-dictionary="{{ $dictionary->example }}"
                                                data-category-dictionary="{{ $dictionary->category }}">
                                                <span class="tf-icons bx bx-edit" style="font-size: 15px;"></span>
                                            </button>
                                            <button type="button"
                                                class="btn btn-icon btn-danger btn-sm buttonDeleteDictionary"
                                                data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="auto" title="Hapus Kamus"
                                                data-code-dictionary="{{ encrypt($dictionary->id) }}"
                                                data-ngoko-dictionary="{{ $dictionary->ngoko }}">
                                                <span class="tf-icons bx bx-trash" style="font-size: 14px;"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($dictionaries->isEmpty())
                                    <tr>
                                        <td colspan="100" class="text-center">Data tidak ditemukan!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </ul>
                @if (!$dictionaries->isEmpty())
                    <div class="mt-3 pagination-mobile">{{ $dictionaries->withQueryString()->onEachSide(1)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div id="errorModalAddDictionary" data-error-ngoko="@error('ngoko') {{ $message }} @enderror"
    data-error-krama="@error('krama') {{ $message }} @enderror"
    data-error-indonesian="@error('indonesian') {{ $message }} @enderror"
    data-error-example="@error('example') {{ $message }} @enderror"
    data-error-audio="@error('audio') {{ $message }} @enderror"
    data-error-category="@error('category') {{ $message }} @enderror"></div>
<!-- Modal Add Dictionary-->
<div class="modal fade" id="formModalAdminDictionary" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="modalAdminDictionary" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-primary fw-bold">Tambah Kamus Baru&nbsp;<i class='bx bx-book fs-5'
                            style="margin-bottom: 1px;"></i></h5>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow cancelModalAddDictionary"
                        data-bs-dismiss="modal"><i class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip"
                            data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="ngoko" class="form-label required-label">Ngoko</label>
                            <input type="text" id="ngoko" name="ngoko" value="{{ old('ngoko') }}"
                                class="form-control @error('ngoko') is-invalid @enderror" placeholder="Masukkan Ngoko"
                                autocomplete="off" required>
                            @error('ngoko')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="krama" class="form-label required-label">Krama</label>
                            <input type="text" id="krama" name="krama" value="{{ old('krama') }}"
                                class="form-control @error('krama') is-invalid @enderror" placeholder="Masukkan Krama"
                                autocomplete="off" required>
                            @error('krama')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="indonesian" class="form-label required-label">Bahasa Indoneisa</label>
                            <input type="text" id="indonesian" name="indonesian" value="{{ old('indonesian') }}"
                                class="form-control @error('indonesian') is-invalid @enderror"
                                placeholder="Masukkan Bahasa Indonesia" autocomplete="off" required>
                            @error('indonesian')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="example" class="form-label">Contoh Kalimat</label>
                            <textarea class="form-control @error('example') is-invalid @enderror" id="example" name="example"
                                autocomplete="off" placeholder="Masukkan contoh kalimat. (max 255 karakter)" rows="4">{{ old('example') }}</textarea>
                            @error('example')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="audio" class="form-label">Upload Audio</label>
                            <input type="file" id="audio" name="audio"
                                class="form-control @error('audio') is-invalid @enderror">
                            @error('audio')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text @error('audio') d-none @enderror">Ukuran audio maks 250 KB</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="category" class="form-label required-label">Kategori</label>
                            <select class="form-select @error('category') is-invalid @enderror" name="category"
                                id="category" style="cursor: pointer;">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option @if (old('category') == 'huruf') selected @endif value="huruf">
                                    Huruf
                                </option>
                                <option @if (old('category') == 'angka') selected @endif value="angka">
                                    Angka
                                </option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger cancelModalAddDictionary"
                        data-bs-dismiss="modal"><i class='bx bx-share fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Batal</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-paper-plane fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="errorModalEditDictionary" data-error-edit-ngoko="@error('ngokoEdit') {{ $message }} @enderror"
    data-error-edit-krama="@error('kramaEdit') {{ $message }} @enderror"
    data-error-edit-indonesian="@error('indonesianEdit') {{ $message }} @enderror"
    data-error-edit-example="@error('exampleEdit') {{ $message }} @enderror"
    data-error-edit-audio="@error('audioEdit') {{ $message }} @enderror"
    data-error-edit-category="@error('categoryEdit') {{ $message }} @enderror"></div>
<!-- Modal Edit Dictionary-->
<div class="modal fade" id="formEditModalAdminDictionary" data-bs-backdrop="static" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/admin/data-kamus/update" method="post" class="modalAdminDictionary"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="codeDictionary" value="{{ old('codeDictionary') }}" name="codeDictionary">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-primary fw-bold">Edit Kamus&nbsp;<i class='bx bx-book fs-5'
                            style="margin-bottom: 1px;"></i></h5>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow cancelModalEditDictionary"
                        data-bs-dismiss="modal"><i class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip"
                            data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="ngokoEdit" class="form-label required-label">Ngoko</label>
                            <input type="text" id="ngokoEdit" name="ngokoEdit" value="{{ old('ngokoEdit') }}"
                                class="form-control @error('ngokoEdit') is-invalid @enderror" autocomplete="off"
                                placeholder="Masukkan Ngoko" required>
                            @error('ngokoEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="kramaEdit" class="form-label required-label">Krama</label>
                            <input type="text" id="kramaEdit" name="kramaEdit" value="{{ old('kramaEdit') }}"
                                class="form-control @error('kramaEdit') is-invalid @enderror" autocomplete="off"
                                placeholder="Masukkan Krama" required>
                            @error('kramaEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="indonesianEdit" class="form-label required-label">Bahasa Indonesia</label>
                            <input type="text" id="indonesianEdit" name="indonesianEdit"
                                value="{{ old('indonesianEdit') }}"
                                class="form-control @error('indonesianEdit') is-invalid @enderror" autocomplete="off"
                                placeholder="Masukkan Bahasa Indonesia" required>
                            @error('indonesianEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleEdit" class="form-label">Contoh Kalimat</label>
                            <textarea class="form-control @error('exampleEdit') is-invalid @enderror" id="exampleEdit" name="exampleEdit"
                                autocomplete="off" placeholder="Masukkan contoh kalimat. (max 255 karakter)" rows="4">{{ old('exampleEdit') }}</textarea>
                            @error('exampleEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="audioEdit" class="form-label">Upload Audio</label>
                            <input type="file" id="audioEdit" name="audioEdit"
                                class="form-control @error('audioEdit') is-invalid @enderror">
                            @error('audioEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text @error('audioEdit') d-none @enderror">Ukuran audio maks 250 KB</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="categoryEdit" class="form-label required-label">Kategori</label>
                            <select class="form-select @error('categoryEdit') is-invalid @enderror"
                                name="categoryEdit" id="categoryEdit" style="cursor: pointer;">
                                <option id="huruf" @if (old('categoryEdit') == 'huruf') selected @endif
                                    value="huruf">Huruf</option>
                                <option id="angka" @if (old('categoryEdit') == 'angka') selected @endif
                                    value="angka">Angka</option>
                            </select>
                            @error('categoryEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger cancelModalEditDictionary"
                        data-bs-dismiss="modal"><i class='bx bx-share fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Batal</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-save fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- modal delete Dictionary -->
<div class="modal fade" id="deleteDictionaryConfirm" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/admin/data-kamus/delete" method="post" id="formDeleteDictionary">
            @csrf
            <input type="hidden" class="codeDictionary" value="{{ old('codeDictionary') }}" name="codeDictionary">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-primary fw-bold">Konfirmasi&nbsp;<i class='bx bx-check-shield fs-5'
                            style="margin-bottom: 3px;"></i></h5>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-dismiss="modal"><i
                            class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip"
                            data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i></button>
                </div>
                <div class="modal-body" style="margin-top: -10px;">
                    <div class="col-sm fs-6 dictionaryMessagesDelete"></div>
                </div>
                <div class="modal-footer" style="margin-top: -5px;">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i
                            class='bx bx-share fs-6' style="margin-bottom: 3px;"></i>&nbsp;Tidak</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-trash fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Ya, Hapus!</button>
                </div>
            </div>
        </form>
    </div>
</div>

@section('script')
    <script src="{{ asset('assets/js/datakamus/index.js') }}"></script>
@endsection
@endsection
