<style>
    tr:hover {
        color: black;
    }
</style>
<?php
/** @var StatusAgendaEntidade $historico */
$historico = $historico;
/** @var StatusAgendaService $statusAgendaService */
$statusAgendaService = new StatusAgendaService();
/** @var UsuarioService $usuarioService */
$usuarioService = new UsuarioService();
/** @var ServicoService $servicoService */
$servicoService = new ServicoService();
/** @var ProfissionalService $profissionalService */
$profissionalService = new ProfissionalService();
/** @var ClienteService $clienteService */
$clienteService = new ClienteService();
/** @var StatusAgendaEntidade $historico */
$statusAgenda = $statusAgendaService->PesquisaUmRegistro($historico->getCoStatusAgenda());
/** @var UsuarioEntidade $usuario */
$usuario = $usuarioService->PesquisaUmRegistro($historico->getCoUsuario()->getCoUsuario());
/** @var ClienteEntidade $cliente */
$cliente = $clienteService->PesquisaUmRegistro($historico->getCoCliente());
/** @var ServicoEntidade $servico */
$servico = $servicoService->PesquisaUmRegistro($historico->getCoServico());
/** @var ProfissionalEntidade $profissional */
$profissional = $profissionalService->PesquisaUmRegistro($historico->getCoProfissional());
?>
<div class="content">
    Cliente: <b>
        <?= ($cliente) ? Valida::Resumi($cliente->getCoPessoa()->getNoPessoa(), 30) : ''; ?></b></br>
    Profissional: <b>
        <?= ($profissional) ? Valida::Resumi($profissional->getCoPessoa()->getNoPessoa(), 30) : ''; ?></b></br>
    Servico: <b>
        <?= ($servico) ? $servico->getNoServico() : ''; ?></b></br>
    Status Agendamento: <b><?= '<span style="border: 0.5px solid rgba(255,255,255,0.5) !important;" 
    class="circle-img label-' . StatusAgendamentoEnum::$cores[$historico->getStStatus()] . '">';
        echo "&nbsp;&nbsp;&nbsp;&nbsp;</span> " . StatusAgendamentoEnum::$descricao[$historico->getStStatus()]; ?></b></br>
    <?php
    if ($historico->getStStatus() == StatusAgendamentoEnum::DELETADO) {
        ?>
        Motivo: <b>
            <?= $statusAgenda->getCoAgenda()->getDsMotivo(); ?></b></br>
    <?php } ?>
    Atendimento: <b><?= Valida::DataShow($historico->getDtInicioAgenda(), 'd/m/Y'); ?></b></br>
    Período: <b>de <?= Valida::DataShow($historico->getDtInicioAgenda(), 'H:i'); ?> a
        <?= Valida::DataShow($historico->getDtFimAgenda(), 'H:i'); ?></b></br>
    Observação: <b>
        <?= Valida::Resumi($historico->getDsObservacao(), 150); ?></b></br>
    Cadastrado em: <b><?=
        Valida::DataShow(
            $historico->getDtCadastro(), 'd/m/Y H:i'
        )
        ?></b></br>
    Cadastrado por: <b><?= Valida::Resumi($usuario->getCoPessoa()->getNoPessoa(), 30); ?></b></br>
</div>