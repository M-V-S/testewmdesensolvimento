<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Teste WM Saúde</title>
    <meta charset="utf-8">
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default navbar-shrink navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <a class="navbar-brand page-scroll" href="#page-top"><img style="width: 220px"
                                                                      src="<?php echo base_url(); ?>public/images/wmsaude2.png"></a>
        </div>
    </div>
</nav>

<section style="min-height: calc(100vh - 83px)" class="light-bg">
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url("restrict/index"); ?>">Médico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url("paciente/index"); ?>">Paciente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url("agendamento/index"); ?>">Agendamento</a>
                </li>
            </ul>
        </nav>
    </div> 

