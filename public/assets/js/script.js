function reloadTable(dataTable) {
    if (dataTable) dataTable.ajax.reload();
}

// Function to open modal
function openModal(modalId) {
    const $modal = $("#" + modalId);
    $("body").css("overflow", "hidden");
    $modal.addClass("open").removeClass("hidden");
    $modal.css("z-index", "90");
    $modal.show();
    $modal.attr("role", "dialog");
    $modal.attr("tabindex", "-1");
    $modal.attr("aria-modal", "true");

    createBackdrop();

    // Close modal when clicking on close button
    $modal
        .off("click", "[data-modal-dismiss='true']")
        .on("click", "[data-modal-dismiss='true']", function () {
            closeModal(modalId);
        });

    // Close modal when pressing the escape key
    $(document)
        .off("keydown")
        .on("keydown", function (event) {
            if (event.key === "Escape") {
                closeModal(modalId);
            }
        });
}

// Function to close modal
function closeModal(modalId) {
    const $modal = $("#" + modalId);
    $modal.addClass("hidden").removeClass("open");
    $modal.hide();
    $("body").css("overflow", "");
    removeBackdrop();

    // Remove event listener for the escape key when modal is closed
    $(document).off("keydown");

    // Reset form elements inside the modal
    const form = $modal.find("form")[0];
    if (form) {
        form.reset();

        // Reset image preview
        $("#imagePreview").attr(
            "src",
            "plugins/assets/media/avatars/blank.png"
        );
    }
}

// Function to create backdrop
function createBackdrop() {
    if (!$(".modal-backdrop").length) {
        $("body").append(
            '<div class="modal-backdrop transition-all duration-300" style="z-index: 89;"></div>'
        );
    }
}

// Function to remove backdrop
function removeBackdrop() {
    $(".modal-backdrop").remove();
}

function successEvent(modalId = null, dataTable = null) {
    if (modalId) {
        const modalEl = document.querySelector("#" + modalId);
        // Tambahkan logika untuk menutup modal menggunakan Tailwind CSS
        if (modalEl) {
            closeModal(modalId);
            removeBackdrop();

            // Mengosongkan input dalam modal
            const inputs = modalEl.querySelectorAll("input, textarea, select");
            inputs.forEach((input) => {
                input.value = "";
                if (input.type === "checkbox" || input.type === "radio") {
                    input.checked = false;
                }
            });
        }
    }
    SUCCESS_ALERT();
    if (dataTable) reloadTable(dataTable);
}

function validation(err) {
    if (err?.errors) {
        options.error = err.errors;
        $("form").addClass("was-validated");
        for (const [key, value] of Object.entries(err.errors)) {
            $(`#${key}`).val("");
            $(`#${key}_feedback`).text(value[0]);
        }
    }
}

const DELETE_DATA = (options) => {
    Swal.fire({
        title: "Anda yakin ingin merubah aktifasi data?",
        html: `data <span class="fw-bold">${options.dataTitle} </span>akan merubah aktifasi`,
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Confirm",
        customClass: {
            confirmButton: "btn btn-primary active", // Tambahkan kelas Bootstrap di sini
            cancelButton: "btn btn-danger active", // Opsional: Ubah warna tombol cancel
        },
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: options.url,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    _method: "delete",
                },
                beforeSend: () => {
                    LOADING_ALERT("Sedang proses data");
                },
                success: () => {
                    setTimeout(() => {
                        SUCCESS_ALERT("Berhasil aktifasi");
                    }, 100);
                    reloadTable(options.dataTable);
                },
                error: (err) => {
                    console.log(err);
                    setTimeout(() => {
                        ERROR_ALERT("Gagal aktifasi");
                    }, 100);
                },
            });
            options.id = null;
        } else if (result.isDenied) {
            options.id = null;
        }
    });
};

const handleFormSubmit = ({
    formSelector,
    dataTableSelector,
    modalSelector,
    baseUrl,
    methodOverride = false,
}) => {
    $("#" + formSelector).on("submit", function (e) {
        e.preventDefault();

        const form = $(this)[0];
        const formData = new FormData(form);

        const id = $("#id").val();
        const url = id ? `${baseUrl}/${id}` : baseUrl;
        const method = id && methodOverride ? "PUT" : "POST";

        if (method === "PUT") {
            formData.append("_method", "PUT");
        }

        $.ajax({
            url: url,
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false, // Jangan ubah Content-Type
            processData: false, // Jangan proses data menjadi string
            beforeSend: function () {
                LOADING_ALERT("Sedang menyimpan data");
            },
            success: function (response) {
                $("#" + formSelector)[0].reset();
                $("#id").val("");
                if (typeof successEvent === "function") {
                    successEvent(modalSelector, dataTableSelector);
                }
                if (dataTableSelector) {
                    $(dataTableSelector).DataTable().ajax.reload();
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseJSON);
                ERROR_ALERT(xhr.responseJSON.message || "An error occurred.");
            },
        });
    });
};

function UPLOAD_FILE(options) {
    let formElement = $(`#${options.formFile}`)[0]; // Ambil elemen DOM dari jQuery object
    let formData = new FormData(formElement); // Inisialisasi FormData dengan elemen DOM

    $.ajax({
        url: options.url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: () => {
            LOADING_ALERT("Sedang upload data");
        },
        success: function (response) {
            if (options.modal && !options.isNotModal)
                successEvent(options.modal, options.dataTable);
            if (options.isNotModal) {
                SUCCESS_ALERT("Berhasil update data");
                reloadTable(options.dataTable);
            }
        },
        error: function (xhr, status, error) {
            const resErr = err?.responseJSON;
            if (resErr?.message && !options.isNotModal) {
                ERROR_ALERT(resErr?.message);
                options.enabledButton();
            } else {
                ERROR_ALERT("Gagal update data");
            }
        },
    });
}

const openModalDetail = (...args) => {
    openModal(args[0]);
    // manghitung umur
    let hariIni = new Date();
    let tanggalLahirDate = new Date(args[1].tanggal_lahir);

    let umur = hariIni.getFullYear() - tanggalLahirDate.getFullYear();
    let bulan = hariIni.getMonth() - tanggalLahirDate.getMonth();
    let hari = hariIni.getDate() - tanggalLahirDate.getDate();

    // Jika bulan atau hari belum tercapai dalam tahun ini, kurangi umur
    if (bulan < 0 || (bulan === 0 && hari < 0)) {
        umur--;
    }
    $("#modal-profile-images").attr(
        "src",
        args[1].images
            ? `${window.location.origin}/storage/${args[1].images}`
            : "assets/images/illustrations/blank.png"
    );
    $("#modal-profile-nama").html(args[1].nama);
    $("#modal-profile-email").html(args[1].email);
    $("#modal-profile-jk").html(
        args[1].jenis_kelamin == "L" ? "Laki-laki" : "Perempuan"
    );
    $("#modal-profile-umur").html(umur);
    $("#modal-profile-jabatan").html(args[1].jabatan.nama);
    $("#modal-profile-tempatlahir").html(args[1].tempat_lahir);
    $("#modal-profile-tgllahir").html(args[1].tanggal_lahir);
    $("#modal-profile-jurusan").html(args[1].jurusan);
    $("#modal-profile-tahun").html(args[1].tahun_lulus);
    $("#modal-profile-contact").html(args[1].noHP);
    $("#modal-profile-nuptk").html(args[1].nuptk);
    $("#modal-profile-status").html(args[1].is_active == 1 ? "Aktif" : "Off");
};

const openModalDetailSiswa = (...args) => {
    openModal(args[0]);
    $("#modal-profile-images").attr(
        "src",
        args[1].images
            ? `${window.location.origin}/storage/${args[1].images}`
            : "assets/images/illustrations/blank.png"
    );
    $("#modal-profile-nama").html(args[1].nama);
    $("#modal-detail-siswa-nis").html(args[1].nis);
    $("#modal-detail-siswa-nisn").html(args[1].nisn);
    $("#modal-detail-siswa-jk").html(
        args[1].jenis_kelamin == "L" ? "Laki-laki" : "Perempuan"
    );
    $("#modal-detail-siswa-tempat-lahir").html(args[1].tempat_lahir);
    $("#modal-detail-siswa-tanggal-lahir").html(args[1].tanggal_lahir);
    $("#modal-detail-siswa-rombel").html(args[1].rombel);
    $("#modal-detail-siswa-agama").html(args[1].agama);
    $("#modal-detail-siswa-kelas").html(args[1].kelas.nama);
    $("#modal-detail-siswa-wali").html(args[1].wali);
    $("#modal-detail-siswa-status").html(
        args[1].is_active == 1
            ? '<span class="badge badge-outline badge-success">Aktif</span>'
            : '<span class="badge badge-outline badge-danger">Non Aktif</span>'
    );
};
