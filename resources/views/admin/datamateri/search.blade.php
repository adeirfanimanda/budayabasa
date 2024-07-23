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
    </style>
@endsection
<div class="flash-message" data-add-materi="@if (session()->has('addMateriSuccess')) {{ session('addMateriSuccess') }} @endif"
    data-edit-materi="@if (session()->has('editMateriSuccess')) {{ session('editMateriSuccess') }} @endif"
    data-delete-materi="@if (session()->has('deleteMateriSuccess')) {{ session('deleteMateriSuccess') }} @endif">
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 order-2 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between" style="margin-bottom: -0.7rem;">
                <div class="justify-content-start">
                    <button type="button" class="btn btn-xs btn-dark fw-bold p-2 buttonAddMateri"
                        data-bs-toggle="modal" data-bs-target="#formModalAdminMateri" style="border-radius: 0.375rem;">
                        <i class='bx bx-book-content fs-6'></i>&nbsp;TAMBAH MATERI
                    </button>
                </div>
                <div class="justify-content-end">
                    <form action="/admin/data-materi/search">
                        <div class="input-group">
                            <input type="search" class="form-control" value="{{ request('q') }}" name="q"
                                id="search" style="border: 1px solid #d9dee3;" placeholder="Cari Data Materi..."
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
                                    <th class="text-white text-center">Jenjang Pendidikan</th>
                                    <th class="text-white">Tanggal Pembuatan Materi</th>
                                    <th class="text-white">Tanggal Update Materi</th>
                                    <th class="text-white">Status</th>
                                    <th class="text-white text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($materials as $index => $material)
                                    <tr>
                                        <td>{{ $materials->firstItem() + $index }}</td>
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
                                        <td class="text-center">
                                            @if ($material->level == 'SD')
                                                <span class="badge bg-label-success fw-bold">{{ 'SD' }}</span>
                                            @elseif ($material->level == 'SMP')
                                                <span class="badge bg-label-primary fw-bold">{{ 'SMP' }}</span>
                                            @elseif ($material->level == 'SMA')
                                                <span class="badge bg-label-info fw-bold">{{ 'SMA' }}</span>
                                            @elseif ($material->level == 'Masyarakat Umum')
                                                <span
                                                    class="badge bg-label-warning fw-bold">{{ 'Masyarakat Umum' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $material->created_at->locale('id')->isoFormat('D MMMM YYYY | H:mm') }}
                                        </td>
                                        <td>
                                            {{ $material->updated_at->locale('id')->isoFormat('D MMMM YYYY | H:mm') }}
                                        </td>
                                        <td>
                                            @if ($material->status == 'Aktif')
                                                <span
                                                    class="badge bg-label-success fw-bold">{{ $material->status }}</span>
                                            @else
                                                <span
                                                    class="badge bg-label-danger fw-bold">{{ $material->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button"
                                                class="btn btn-icon btn-primary btn-sm buttonEditMateri"
                                                data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="auto" title="Edit Materi"
                                                data-code-materi="{{ encrypt($material->id) }}"
                                                data-title-materi="{{ $material->title }}"
                                                data-desc-materi="{{ $material->description }}"
                                                data-level-materi="{{ $material->level }}"
                                                data-status-materi="{{ $material->status }}">
                                                <span class="tf-icons bx bx-edit" style="font-size: 15px;"></span>
                                            </button>
                                            <button type="button"
                                                class="btn btn-icon btn-danger btn-sm buttonDeleteMateri"
                                                data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="auto" title="Hapus Materi"
                                                data-code-materi="{{ encrypt($material->id) }}"
                                                data-title-materi="{{ $material->title }}">
                                                <span class="tf-icons bx bx-trash" style="font-size: 14px;"></span>
                                            </button>
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

<div id="errorModalAddMateri" data-error-title="@error('title') {{ $message }} @enderror"
    data-error-desc="@error('description') {{ $message }} @enderror"
    data-error-document="@error('document') {{ $message }} @enderror"
    data-error-level="@error('level') {{ $message }} @enderror">
</div>
<!-- Modal Add Materi-->
<div class="modal fade" id="formModalAdminMateri" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/admin/data-materi" method="post" class="modalAdminMateri" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-primary fw-bold">Tambah Materi Baru&nbsp;<i
                            class='bx bx-book-content fs-5' style="margin-bottom: 1px;"></i></h5>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow cancelModalAddMateri"
                        data-bs-dismiss="modal"><i class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip"
                            data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="title" class="form-label required-label">Judul Materi</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Masukkan judul materi" autocomplete="off" required>
                            @error('title')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="deskripsi" class="form-label required-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="deskripsi" name="description"
                                autocomplete="off" placeholder="Masukkan deskripsi materi. (max 255 karakter)" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="document" class="form-label required-label">Upload Dokumen</label>
                            <input type="file" id="document" name="document"
                                class="form-control @error('document') is-invalid @enderror" required>
                            @error('document')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text @error('document') d-none @enderror">
                                Ukuran maks 20 MB. Format: PDF, DOC, DOCX.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="level" class="form-label required-label">Jenjang Pendidikan</label>
                            <select id="level" name="level"
                                class="form-select @error('level') is-invalid @enderror" style="cursor: pointer;"
                                required>
                                <option value="" disabled selected>Pilih Jenjang Pendidikan</option>
                                <option value="SD" {{ old('level') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('level') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('level') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="Masyarakat Umum"
                                    {{ old('level') == 'Masyarakat Umum' ? 'selected' : '' }}>Masyarakat Umum</option>
                            </select>
                            @error('level')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger cancelModalAddMateri"
                        data-bs-dismiss="modal"><i class='bx bx-share fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Batal
                    </button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-paper-plane fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Tambah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="errorModalEditMateri" data-error-edit-title="@error('titleEdit') {{ $message }} @enderror"
    data-error-edit-desc="@error('descriptionEdit') {{ $message }} @enderror"
    data-error-edit-document="@error('documentEdit') {{ $message }} @enderror"
    data-error-edit-level="@error('levelEdit') {{ $message }} @enderror"
    data-error-edit-status="@error('status') {{ $message }} @enderror"></div>
<!-- Modal Edit Materi-->
<div class="modal fade" id="formEditModalAdminMateri" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/admin/data-materi/update" method="post" class="modalAdminMateri"
            enctype="multipart/form-data">>
            @csrf
            <input type="hidden" class="codeMateri" value="{{ old('codeMateri') }}" name="codeMateri">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-primary fw-bold">Edit Materi&nbsp;<i class='bx bx-book-content fs-5'
                            style="margin-bottom: 1px;"></i></h5>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow cancelModalEditDoucument"
                        data-bs-dismiss="modal"><i class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip"
                            data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="titleEdit" class="form-label required-label">Judul Materi</label>
                            <input type="text" id="titleEdit" name="titleEdit" value="{{ old('titleEdit') }}"
                                class="form-control @error('titleEdit') is-invalid @enderror" autocomplete="off"
                                placeholder="Masukkan judul materi" required>
                            @error('titleEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="deskripsiEdit" class="form-label required-label">Deskripsi</label>
                            <textarea class="form-control @error('descriptionEdit') is-invalid @enderror" id="deskripsiEdit"
                                name="descriptionEdit" placeholder="Masukkan deskripsi materi. (max 255 karakter)" rows="4"
                                autocomplete="off" required>{{ old('descriptionEdit') }}</textarea>
                            @error('descriptionEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="documentEdit" class="form-label">Upload Dokumen</label>
                            <input type="file" id="documentEdit" name="documentEdit"
                                class="form-control @error('documentEdit') is-invalid @enderror">
                            @error('documentEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text @error('documentEdit') d-none @enderror">
                                Ukuran maks 20 MB. Format: PDF, DOC, DOCX.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="levelEdit" class="form-label required-label">Jenjang Pendidikan</label>
                            <select class="form-select @error('levelEdit') is-invalid @enderror" name="levelEdit"
                                id="levelEdit">
                                <option value="" disabled {{ old('levelEdit') == '' ? 'selected' : '' }}>
                                    Pilih Jenjang Pendidikan
                                </option>
                                <option value="SD" {{ old('levelEdit') == 'SD' ? 'selected' : '' }}>
                                    SD
                                </option>
                                <option value="SMP" {{ old('levelEdit') == 'SMP' ? 'selected' : '' }}>
                                    SMP
                                </option>
                                <option value="SMA" {{ old('levelEdit') == 'SMA' ? 'selected' : '' }}>
                                    SMA
                                </option>
                                <option value="Masyarakat Umum"
                                    {{ old('levelEdit') == 'Masyarakat Umum' ? 'selected' : '' }}>
                                    Masyarakat Umum
                                </option>
                            </select>
                            @error('levelEdit')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row statusEdit">
                        <div class="col mb-3">
                            <label for="status" class="form-label required-label">Status Materi</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status"
                                id="status" style="cursor: pointer;">
                                <option id="aktif" value="Aktif">Aktif</option>
                                <option id="nonaktif" value="Nonaktif">Nonaktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback" style="margin-bottom: -3px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger cancelModalEditMateri"
                        data-bs-dismiss="modal"><i class='bx bx-share fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Batal</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-save fs-6'
                            style="margin-bottom: 3px;"></i>&nbsp;Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- modal delete Materi -->
<div class="modal fade" id="deleteMateriConfirm" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/admin/data-materi/delete" method="post" id="formDeleteMateri">
            @csrf
            <input type="hidden" class="codeMateri" value="{{ old('codeMateri') }}" name="codeMateri">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-primary fw-bold">Konfirmasi&nbsp;<i class='bx bx-check-shield fs-5'
                            style="margin-bottom: 3px;"></i></h5>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-dismiss="modal"><i
                            class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip"
                            data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i></button>
                </div>
                <div class="modal-body" style="margin-top: -10px;">
                    <div class="col-sm fs-6 materiMessagesDelete"></div>
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
    <script src="{{ asset('assets/js/datamateri/index.js') }}"></script>
@endsection
@endsection
