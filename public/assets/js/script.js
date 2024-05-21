$(function () {
    const Toast = Swal.mixin({
        iconColor: "white",
        customClass: {
            popup: "colored-toast",
        },
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    // flash messages nilai
    const flashMessage = $(".flash-message").data("flash-message");
    const flashMessageDeleteNilai = $(".flash-message").data(
        "flash-message-delete-nilai"
    );

    function setMessage(message, status) {
        Toast.fire({
            icon: status,
            title: message,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            toast: true,
            position: "top-end",
        });
    }
    if (flashMessage) {
        setMessage(flashMessage, "warning");
    } else {
        $(".iconPetunjukQuiz").tooltip("show");
        setTimeout(function () {
            $(".iconPetunjukQuiz").tooltip("hide");
        }, 3000);
    }

    flashMessageDeleteNilai
        ? setMessage(flashMessageDeleteNilai, "success")
        : false;

    // Penanganan error form modal saat Add & Edit quiz
    const errorTitle = $("#errorModalAddQuiz").data("error-title");
    const errorDesc = $("#errorModalAddQuiz").data("error-desc");
    const errorEditTitle = $("#errorModalEditQuiz").data("error-edit-title");
    const errorEditDesc = $("#errorModalEditQuiz").data("error-edit-desc");
    const errorEditStatus = $("#errorModalEditQuiz").data("error-edit-status");

    // Jika terjadi kesalahan saat Add quiz
    if (errorTitle || errorDesc) {
        $("#formModalAdminQuiz").modal("show");
    }
    // Jika terjadi kesalahan saat Edit quiz
    if (errorEditTitle || errorEditDesc || errorEditStatus) {
        $("#formEditModalAdminQuiz").modal("show");
    }

    // Penanganan error form modal saat Add & Edit dokumen
    const errorAddDocumentTitle = $("#errorModalAddDocument").data("error-title");
    const errorAddDocumentDesc = $("#errorModalAddDocument").data("error-desc");
    const errorAddDocument = $("#errorModalAddDocument").data("error-document");
    const errorEditDocumentTitle = $("#errorModalEditDocument").data("error-edit-title");
    const errorEditDocumentDesc = $("#errorModalEditDocument").data("error-edit-desc");
    const errorEditDocument = $("#errorModalAddDocument").data("error-edit-document");
    const errorEditDocumentStatus = $("#errorModalEditDocument").data("error-edit-status");

    // Jika terjadi kesalahan saat Add dokumen
    if (errorAddDocumentTitle || errorAddDocumentDesc || errorAddDocument) {
        $("#formModalAdminDocument").modal("show");
    }
    // Jika terjadi kesalahan saat Edit dokumen
    if (errorEditDocumentTitle || errorEditDocumentDesc || errorEditDocument || errorEditDocumentStatus) {
        $("#formEditModalAdminDocument").modal("show");
    }

    // form modal errors if add question
    const errorQuestion = $("#errorModaladdQuestion").data("error-question");
    const option1 = $("#errorModaladdQuestion").data("error-option1");
    const option2 = $("#errorModaladdQuestion").data("error-option2");
    const option3 = $("#errorModaladdQuestion").data("error-option3");
    const option4 = $("#errorModaladdQuestion").data("error-option4");
    const correct = $("#errorModaladdQuestion").data("error-correct");
    const score = $("#errorModaladdQuestion").data("error-score");

    if (
        errorQuestion ||
        option1 ||
        option2 ||
        option3 ||
        option4 ||
        correct ||
        score
    ) {
        $("#formModalAdminAddQuestions").modal("show");
    }

    // form modal errors if edit question
    const errorEditQuestion = $("#errorModalEditQuestion").data(
        "error-edit-question"
    );
    const editOption1 = $("#errorModalEditQuestion").data("error-edit-option1");
    const editOption2 = $("#errorModalEditQuestion").data("error-edit-option2");
    const editOption3 = $("#errorModalEditQuestion").data("error-edit-option3");
    const editOption4 = $("#errorModalEditQuestion").data("error-edit-option4");
    const editCorrect = $("#errorModalEditQuestion").data("error-edit-correct");
    const editScore = $("#errorModalEditQuestion").data("error-edit-score");

    if (
        errorEditQuestion ||
        editOption1 ||
        editOption2 ||
        editOption3 ||
        editOption4 ||
        editCorrect ||
        editScore
    ) {
        $("#formModalAdminEditQuestion").modal("show");
    }

    // falsh message add quiz & edit quiz
    const statusAddQuiz = $(".flash-message").data("add-quiz");
    const statusUpdateQuiz = $(".flash-message").data("edit-quiz");
    const statusDeleteQuiz = $(".flash-message").data("delete-quiz");
    const statusDeleteQuizError = $(".flash-message").data("error-delete-quiz");
    if (statusAddQuiz) {
        setMessage(statusAddQuiz, "success");
    }
    if (statusUpdateQuiz) {
        setMessage(statusUpdateQuiz, "success");
    }
    if (statusDeleteQuiz) {
        setMessage(statusDeleteQuiz, "success");
    }
    if (statusDeleteQuizError) {
        setMessage(statusDeleteQuizError, "error");
    }

    // flash message add question & edit question
    const statusAddQuestion = $(".flash-message").data("add-question");
    const statusAddQuestionFailed = $(".flash-message").data(
        "add-question-failed"
    );
    const statusUpdateQuestion = $(".flash-message").data("edit-question");
    const statusUpdateQuestionFailed = $(".flash-message").data(
        "edit-question-failed"
    );
    const statusDeleteQuestion = $(".flash-message").data("delete-question");
    const statusDeleteQuestionError = $(".flash-message").data(
        "error-delete-question"
    );
    const statusUpdateQuestionError = $(".flash-message").data(
        "update-question-error"
    );
    if (statusAddQuestion) {
        setMessage(statusAddQuestion, "success");
    }
    if (statusAddQuestionFailed) {
        setMessage(statusAddQuestionFailed, "error");
    }
    if (statusUpdateQuestion) {
        setMessage(statusUpdateQuestion, "success");
    }
    if (statusUpdateQuestionFailed) {
        setMessage(statusUpdateQuestionFailed, "error");
    }
    if (statusDeleteQuestion) {
        setMessage(statusDeleteQuestion, "success");
    }
    if (statusDeleteQuestionError) {
        setMessage(statusDeleteQuestionError, "error");
    }
    if (statusUpdateQuestionError) {
        setMessage(statusUpdateQuestionError, "error");
    }

    const statusVerify = $(".statusverify").data("status-verify-success");
    const statusVerifyFailed = $(".statusverify").data("status-verify-failed");
    const usernameRequired = $(".validateMessages").data("username-required");
    const passwordRequired = $(".validateMessages").data("password-required");
    if (statusVerify) {
        $("#formModalUsersSetEmail").modal("show");
    }
    if (statusVerifyFailed) {
        $("#formModalUsersEditEmail").modal("show");
    }
    if (usernameRequired || passwordRequired) {
        $("#formModalUsersEditEmail").modal("show");
    }

    // notif berhasil update email
    const updateEmailSuccess = $(".statusUpdateEmail").data(
        "update-email-success"
    );
    if (updateEmailSuccess) {
        setMessage(updateEmailSuccess, "success");
    }

    const validatedEmail = $(".validatedEmail").data("email");
    if (validatedEmail) {
        $("#formModalUsersSetEmail").modal("show");
    }

    // notif update information user
    const infoUpdateSettings = $(".infoupdate").data("user-updated");
    if (infoUpdateSettings) {
        setMessage(infoUpdateSettings, "success");
    }

    // update password
    const passLamaFailed = $(".infoupdatepass").data("pass-lama-failed");
    const updatedPass = $(".infoupdatepass").data("updated-pass");
    if (updatedPass) {
        setMessage(updatedPass, "success");
    }
    if (passLamaFailed) {
        setMessage(passLamaFailed, "error");
    }

    //update app
    const updatedApp = $(".infoupdate").data("update-app");
    if (updatedApp) {
        setMessage(updatedApp, "success");
    }

    // add,edit,delete pengguna errors
    const errName = $("#errorModalAddUser").data("error-p-name");
    const errUsername = $("#errorModalAddUser").data("error-p-username");
    const errEmail = $("#errorModalAddUser").data("error-p-email");
    const errGender = $("#errorModalAddUser").data("error-p-gender");
    const errPass = $("#errorModalAddUser").data("error-p-pass");
    const errImg = $("#errorModalAddUser").data("error-p-image");

    if (errName || errUsername || errEmail || errGender || errPass || errImg) {
        $("#formModalAdminAddPengguna").modal("show");
    }

    const errEditName = $("#errorModalEditUser").data("error-p-name");
    const errEditUsername = $("#errorModalEditUser").data("error-p-username");
    const errEditEmail = $("#errorModalEditUser").data("error-p-email");
    const errEditGender = $("#errorModalEditUser").data("error-p-gender");
    const errEditPass = $("#errorModalEditUser").data("error-p-pass");
    const errEditImg = $("#errorModalEditUser").data("error-p-image");

    if (
        errEditName ||
        errEditUsername ||
        errEditEmail ||
        errEditGender ||
        errEditPass ||
        errEditImg
    ) {
        $("#formModalAdminEditPengguna").modal("show");
    }

    const addUserSuccess = $(".flash-message-pengguna").data("add-p-user");
    if (addUserSuccess) {
        setMessage(addUserSuccess, "success");
    }
    const editUserSuccess = $(".flash-message-pengguna").data("edit-p-user");
    if (editUserSuccess) {
        setMessage(editUserSuccess, "success");
    }
    const deleteUserSuccess = $(".flash-message-pengguna").data(
        "delete-p-user"
    );
    if (deleteUserSuccess) {
        setMessage(deleteUserSuccess, "success");
    }

    // add dictionary success
    const addDictionary = $(".flash-message").data("add-dictionary");
    if (addDictionary) {
        setMessage(addDictionary, "success");
    }
    // edit dictionary success
    const editDictionary = $(".flash-message").data("edit-dictionary");
    if (editDictionary) {
        setMessage(editDictionary, "success");
    }
    // delete dictionary success
    const deleteDictionary = $(".flash-message").data("delete-dictionary");
    if (deleteDictionary) {
        setMessage(deleteDictionary, "success");
    }

    // error add dictionary
    const errAddDictionaryNgoko = $("#errorModalAddDictionary").data("error-ngoko");
    const errAddDictionaryKrama = $("#errorModalAddDictionary").data("error-krama");
    const errAddDictionaryIndonesian = $("#errorModalAddDictionary").data("error-indonesian");
    const errAddDictionaryExample = $("#errorModalAddDictionary").data("error-example");
    const errAddDictionaryAudio = $("#errorModalAddDictionary").data("error-audio");
    const errAddDictionaryCategory = $("#errorModalAddDictionary").data(
        "error-category"
    );

    if (
        errAddDictionaryNgoko ||
        errAddDictionaryKrama ||
        errAddDictionaryIndonesian ||
        errAddDictionaryExample ||
        errAddDictionaryAudio ||
        errAddDictionaryCategory
    ) {
        $("#formModalAdminDictionary").modal("show");
    }

    // error edit Dictionary
    const errEditDictionaryNgoko = $("#errorModalEditDictionary").data(
        "error-edit-ngoko"
    );
    const errEditDictionaryKrama = $("#errorModalEditDictionary").data(
        "error-edit-krama"
    );
    const errEditDictionaryIndonesian = $("#errorModalEditDictionary").data(
        "error-edit-indonesian"
    );
    const errEditDictionaryExample = $("#errorModalEditDictionary").data(
        "error-edit-example"
    );
    const errEditDictionaryAudio = $("#errorModalEditDictionary").data(
        "error-edit-audio"
    );
    const errEditDictionaryCategory = $("#errorModalEditDictionary").data(
        "error-edit-category"
    );

    if (
        errEditDictionaryNgoko ||
        errEditDictionaryKrama ||
        errEditDictionaryIndonesian ||
        errEditDictionaryExample ||
        errEditDictionaryCategory ||
        errEditDictionaryAudio
    ) {
        $("#formEditModalAdminDictionary").modal("show");
    }

    // add & delete topic forum success
    const addTopicForum = $(".flash-message").data("add-topic");
    const deleteTopicForum = $(".flash-message").data("delete-topic");
    if (addTopicForum) {
        setMessage(addTopicForum, "success");
    }
    if (deleteTopicForum) {
        setMessage(deleteTopicForum, "success");
    }

    // error add new topic forum
    const errAddNewTopicTitle = $("#errorModalAddTopic").data("error-title");
    const errAddNewTopicContent = $("#errorModalAddTopic").data(
        "error-content"
    );

    if (errAddNewTopicTitle || errAddNewTopicContent) {
        $("#formModalAddTopic").modal("show");
    }
});
