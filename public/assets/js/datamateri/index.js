// Membersihkan form saat tombol cancel diklik
$(".cancelModalAddMateri, .cancelModalEditMateri").on("click", function () {
    // Reset form modal
    $(".modalAdminMateri")[0].reset();

    // Remove invalid feedback and reset input values
    var inputs = $("#formModalAdminMateri #title, #formModalAdminMateri #deskripsi, #formModalAdminMateri #document, #formModalAdminMateri #level, #formEditModalAdminMateri #titleEdit, #formEditModalAdminMateri #deskripsiEdit, #formEditModalAdminMateri #documentEdit");
    inputs.removeClass("is-invalid invalid-feedback").val("");
});

// Memuat data ke dalam form edit saat tombol edit diklik
$(".buttonEditMateri").on("click", function () {
    const code = $(this).data("code-materi");
    const title = $(this).data("title-materi");
    const desc = $(this).data("desc-materi");
    const level = $(this).data("level-materi");
    const statusMateri = $(this).data("status-materi");
    statusMateri == "Aktif"
        ? $("#aktif").attr("selected", true)
        : $("#nonaktif").attr("selected", true);
    $(".codeMateri").val(code);
    $("#titleEdit").val(title);
    $("#deskripsiEdit").val(desc);
    $("#levelEdit").val(level);
    $("#formEditModalAdminMateri").modal("show");
});

// Menampilkan konfirmasi penghapusan saat tombol delete diklik
$(".buttonDeleteMateri").on("click", function () {
    const data = $(this).data("title-materi");
    const code = $(this).data("code-materi");
    $(".materiMessagesDelete").html(`Anda yakin ingin menghapus data materi dengan nama <strong>'${data}'</strong> ?`);
    $(".codeMateri").val(code);
    $("#deleteMateriConfirm").modal("show");
});
