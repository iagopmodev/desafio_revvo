<?php include 'header.php'; ?>  

<div class="container mt-5">
    <div class="d-flex justify-content-between mb-4">
        <h2>Lista de Cursos</h2>
        <button class="btn btn-success" id="btnAddCourse">Adicionar Curso</button>
    </div>

    <div class="row" id="coursesContainer">
        <!-- Os cards dos cursos serão carregados dinamicamente aqui -->
    </div>
</div>

<!-- Modal para Detalhes/Editar Curso -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="courseForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="courseModalLabel">Detalhes do Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="courseId" name="id">
                    <div id="courseDetails">
                        <h5 id="courseNameView"></h5>
                        <p id="courseDescriptionView"></p>
                        <p><strong>Duração:</strong> <span id="courseDurationView"></span> horas</p>
                        <p><strong>Preço:</strong> R$ <span id="coursePriceView"></span></p>
                    </div>
                    <div id="courseEditForm" style="display: none;">
                        <div class="mb-3">
                            <label for="courseName" class="form-label">Nome do Curso</label>
                            <input type="text" class="form-control" id="courseName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="courseDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="courseDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="courseDuration" class="form-label">Duração (horas)</label>
                            <input type="number" class="form-control" id="courseDuration" name="DURACAO" required>
                        </div>
                        <div class="mb-3">
                            <label for="coursePrice" class="form-label">Preço</label>
                            <input type="number" class="form-control" id="coursePrice" name="PRECO" step="0.01" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btnDeleteCourse">Excluir</button>                    
                    <button type="button" class="btn btn-primary" id="btnEditCourse">Editar</button>
                    <button type="submit" class="btn btn-success" id="btnSaveCourse" style="display: none;">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--modal inicial-->
<div id="modalInicial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalInicialLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInicialLabel">Bem-vindo!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="images/banner1.jpg" alt="Bem-vindo à plataforma" class="img-fluid mb-3" style="max-width: 100%; height: auto;"> 
                    <p>Seja bem-vindo à nossa plataforma. Aproveite para explorar os cursos disponíveis!</p>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
<script src="../public/js/cursos.js"></script>