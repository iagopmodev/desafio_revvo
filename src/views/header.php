<!DOCTYPE html>  
<html lang="pt-BR">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Meu Projeto</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css"> <!-- CSS global -->
</head>  
<body>  
    <header class="btext-white p-4 text-center" style="background-color: #f8f9fa; color: black;">  
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" style="color:black; font-weight: bold;">LEO</a>
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar" aria-label="Input group example" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                            </svg>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-sm-3 my-1">
            </div>
        </nav>
    </header>
    <?php include 'carousel.php'; ?>