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
    options.enabledButton();
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

const POST_DATA = (options) => {
    $.ajax({
        url: options.url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: options.data,
        contentType: false, // Important for file uploads
        processData: false, // Important for file uploads
        cache: false,
        beforeSend: () => {
            LOADING_ALERT("Sedang menyimpan data");
        },
        success: (res) => {
            console.log(res);
            if (modal) successEvent(options.modal, options.dataTable);
            if (options.dataTableId) {
                $(`${options.dataTableId}`).DataTable().ajax.reload();
                options.dataTableId = null;
            }
        },
        error: (err) => {
            const resErr = err?.responseJSON;
            validation(resErr);
            if (resErr.message) {
                ERROR_ALERT(resErr.message);
            }
            options.enabledButton();
            if (options.file) $(`input[type=file]`).prop("disabled", false);
        },
    });
};

const PATCH_DATA = (options) => {
    $.ajax({
        url: options.url + "/" + options.id,
        type: "PATCH",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: options.data,
        beforeSend: () => {
            LOADING_ALERT("Sedang merubah data");
        },
        success: (data) => {
            if (modal && !options.isNotModal)
                successEvent(options.modal, options.dataTable);
            if (options.isNotModal) {
                SUCCESS_ALERT("Berhasil update data");
                reloadTable(options.dataTable);
            }
        },
        error: (err) => {
            const resErr = err?.responseJSON;
            validation(resErr);
            if (resErr?.message && !options.isNotModal) {
                ERROR_ALERT(resErr?.message);
                options.enabledButton();
            } else {
                ERROR_ALERT("Gagal update data");
            }
        },
    });
};

const DELETE_DATA = (options) => {
    Swal.fire({
        title: "Anda yakin ingin merubah aktifasi data?",
        html: `data <span class="fw-bold">${options.dataTitle} </span>akan merubah aktifasi`,
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: options.id ? options.url + "/" + options.id : options.url,
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
                        // if (options.dataTableId) {
                        //     $(`${options.dataTableId}`)
                        //         .DataTable()
                        //         .ajax.reload();
                        //     options.dataTableId = null;
                        // }
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
            validation(resErr);
            if (resErr?.message && !options.isNotModal) {
                ERROR_ALERT(resErr?.message);
                options.enabledButton();
            } else {
                ERROR_ALERT("Gagal update data");
            }
        },
    });
}
