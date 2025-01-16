$(document).ready(function () {

    showModalInicial();
    const coursesContainer = $('#coursesContainer');
    const courseModal = new bootstrap.Modal($('#courseModal')[0]);
    const courseForm = $('#courseForm');
    const courseDetails = $('#courseDetails');
    const courseEditForm = $('#courseEditForm');
    const btnEditCourse = $('#btnEditCourse');
    const btnSaveCourse = $('#btnSaveCourse');
    const btnDeleteCourse = $('#btnDeleteCourse');

    // Carregar cursos
    function loadCourses() {
        $.ajax({
            url: 'http://localhost:8080/listarCursos',
            method: 'GET',
            success: function (response) {
                try {
                    const courses = JSON.parse(response);
                    coursesContainer.empty();
                    courses.forEach(course => {
                        const card = `
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="../public/images/curso2.jpg" class="card-img-top" alt="${course.nome}">
                                    <div class="card-body">
                                        <h5 class="card-title">${course.nome}</h5>
                                        <p class="card-text">${course.descricao}</p>
                                        <button class="btn btn-primary btnViewMore" data-id="${course.id}">Ver Mais</button>
                                    </div>
                                </div>
                            </div>`;
                        coursesContainer.append(card);
                    });
                } catch (e) {
                    console.error("Erro ao carregar cursos:", e);
                }
            }
        });
    }

    // Abrir Modal para Ver Mais
    coursesContainer.on('click', '.btnViewMore', function () {
        const id = $(this).data('id');
        $.ajax({
            url: `http://localhost:8080/listarCursos/${id}`,
            method: 'GET',
            success: function (response) {
                const course = JSON.parse(response);
                $('#courseId').val(course.id);
                $('#courseNameView').text(course.nome);
                $('#courseDescriptionView').text(course.descricao);
                $('#courseDurationView').text(course.duracao);
                $('#coursePriceView').text(course.preco);

                // Ajustar visibilidade
                courseDetails.show();
                courseEditForm.hide();
                btnEditCourse.show();
                btnSaveCourse.hide();
                btnDeleteCourse.show();

                courseModal.show();
            }
        });
    });

    // Editar Curso
    btnEditCourse.click(function () {
        courseDetails.hide();
        courseEditForm.show();
        btnEditCourse.hide();
        btnSaveCourse.show();

        // Preencher campos do formulário
        $('#courseName').val($('#courseNameView').text());
        $('#courseDescription').val($('#courseDescriptionView').text());
        $('#courseDuration').val($('#courseDurationView').text());
        $('#coursePrice').val($('#coursePriceView').text());
    });

    // Salvar Curso
    courseForm.on('submit', function (e) {
        e.preventDefault();

        const id = $('#courseId').val();
        const descricao = $('#courseDescription').val();
        const nome = $('#courseName').val();
        const duracao = $('#courseDuration').val();
        const preco = $('#coursePrice').val();
        
        const formData = {
            NOME        :   nome,
            DESCRICAO   :   descricao,
            DURACAO     :   duracao,
            PRECO       :   preco
        }

        console.log(formData);
        $.ajax({
            url: `http://localhost:8080/editarCurso/${id}`,
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function () {
                courseModal.hide();
                loadCourses();
            },
            error: function (xhr, status, error) {
                console.error('Erro ao salvar curso:', error);
            }
        });
    });

    // Excluir Curso
    btnDeleteCourse.click(function () {
        const id = $('#courseId').val();
        console.log(id);
        if (confirm('Tem certeza que deseja excluir este curso?')) {
            $.ajax({
                url: `http://localhost:8080/deletarCurso/${id}`,
                method: 'DELETE',
                data: { id },
                success: function () {
                    courseModal.hide();
                    loadCourses();
                }
            });
        }
    });

    btnAddCourse.click(function () {
        $('#courseModal')[0].reset();

        courseDetails.hide();
        courseEditForm.show();
        btnEditCourse.hide();
        btnSaveCourse.show();
        btnDeleteCourse.hide();

        $('#courseId').val('');
        courseModal.show();
    });

    function showModalInicial() {
        if (!localStorage.getItem('modalShown')) {  
            $('#modalInicial').modal('show');  
            localStorage.setItem('modalShown', 'true');  
        }          
    }

    
    // Inicializar
    loadCourses();
});