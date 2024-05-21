// Membersihkan form saat tombol cancel diklik
$(".cancelModalAddDictionary, .cancelModalEditDictionary").on("click", function () {
    $(".modalAdminDictionary")[0].reset();

    var inputs = $("#formModalAdminDictionary #ngoko, #formModalAdminDictionary #krama, #formModalAdminDictionary #indonesian, #formModalAdminDictionary #example, #formModalAdminDictionary #audio, #formModalAdminDictionary #category, #formEditModalAdminDictionary #ngokoEdit, #formEditModalAdminDictionary #kramaEdit, #formEditModalAdminDictionary #indonesianEdit, #formEditModalAdminDictionary #exampleEdit, #formEditModalAdminDictionary #audioEdit, #formEditModalAdminDictionary #categoryEdit");
    inputs.removeClass("is-invalid invalid-feedback").val("");
});

// Memuat data ke dalam form edit saat tombol edit diklik
$(".buttonEditDictionary").on("click", function () {
    const code = $(this).data("code-dictionary");
    const ngoko = $(this).data("ngoko-dictionary");
    const krama = $(this).data("krama-dictionary");
    const indonesian = $(this).data("indonesian-dictionary");
    const example = $(this).data("example-dictionary");
    const category = $(this).data("category-dictionary");
    if (category == "huruf") {
        $("#huruf").attr("selected", true);
    } else if (category == "angka") {
        $("#angka").attr("selected", true);
    }
    $(".codeDictionary").val(code);
    $("#ngokoEdit").val(ngoko);
    $("#kramaEdit").val(krama);
    $("#indonesianEdit").val(indonesian);
    $("#exampleEdit").val(example);
    $("#formEditModalAdminDictionary").modal("show");
});

// Menampilkan konfirmasi penghapusan saat tombol delete diklik
$(".buttonDeleteDictionary").on("click", function () {
    const data = $(this).data("ngoko-dictionary");
    const code = $(this).data("code-dictionary");
    $(".dictionaryMessagesDelete").html(`Anda yakin ingin menghapus data kamus dengan nama <strong>'${data}'</strong> ?`);
    $(".codeDictionary").val(code);
    $("#deleteDictionaryConfirm").modal("show");
});
