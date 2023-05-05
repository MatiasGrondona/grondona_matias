<div class="container">
    <button data-open-modal class="btn-primary">Abrir</button>

    <dialog data-modal>
        <div>esto es un modal</div>
        <button data-close-modal class="btn-secondary">Cerrar</button>
    </dialog>
    <script>
        const abrirModal = document.querySelector("[data-open-modal]");
        const cerrarModal = document.querySelector("[data-close-modal]");
        const modal = document.querySelector("[data-modal]");

        abrirModal.addEventListener("click", () => {
            modal.showModal();
        });
        cerrarModal.addEventListener("click", () => {
            modal.close();
        });
    </script>
</div>