<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}
$pesp = $_POST['pesq'] ?? '';
if ($pesp != '') {
    $sql = $pdo->query("SELECT * FROM processo_leitura WHERE IP_mem = '$_SESSION[IP_mem]' AND (titulo_pl LIKE '%$pesp%' OR desc_pl LIKE '%$pesp%') ORDER BY id_pl DESC LIMIT 10");
} else {
    $sql = $pdo->query("SELECT * FROM processo_leitura WHERE IP_mem = '$_SESSION[IP_mem]' ORDER BY id_pl DESC limit 10");
}
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "<tr><td colspan='7'>Nenhum processo encontrado.</td></tr>";
} else {

    ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Livro</th>
            <th scope="col">Título</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data Início</th>
            <th scope="col">Data Fim</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            for ($i = 0; $i < count($res); $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                $id_pl = $res[$i]['id_pl'];
                $id_l = $res[$i]['id_l'];
                $titulo_pl = $res[$i]['titulo_pl'];
                $desc_pl = $res[$i]['desc_pl'];
                $data_ini = $res[$i]['data_ini_pl'];
                $data_fim = $res[$i]['data_fim_pl'];
                $status_pl = $res[$i]['status_pl'];

                // Buscar o nome do livro com base no id_l
                $sql_livro = $pdo->query("SELECT nome_livro FROM livros WHERE id_l = '$id_l'");
                $res_livro = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
                $nome_l = count($res_livro) > 0 ? $res_livro[0]['nome_livro'] : 'Livro não encontrado';

                $data_ini = date('d/m/Y', strtotime($data_ini));
                $data_fim = $data_fim ? date('d/m/Y', strtotime($data_fim)) : '---';
                $desc_pl = (strlen($desc_pl) > 10) ? substr($desc_pl, 0, 10) . '...' : $desc_pl;

                if ($status_pl == 'Aberto') {
                    $status_pl_bg = 'bg-success text-white';
                } else {
                    $status_pl_bg = 'bg-warning text-info';
                }
                ?>
                <tr>
                    <th scope="row"><?php echo $id_pl; ?></th>
                    <td><?php echo $nome_l; ?></td>
                    <td><?php echo $titulo_pl; ?></td>
                    <td><?php echo $desc_pl; ?></td>
                    <td><?php echo $data_ini; ?></td>
                    <td><?php echo $data_fim; ?></td>
                    <td class="<?php echo $status_pl_bg; ?>"><?php echo $status_pl; ?></td>
                    <td>
                        <a href="#" title="Excluir" class="text-dark f-20" data-bs-toggle="modal" data-bs-target="#ModalConfirmDel" onclick="document.getElementById('idDel_PL').value = '<?php echo $id_pl; ?>'"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" title="Finalizar Precesso" class="text-danger f-20" data-bs-toggle="modal" data-bs-target="#ModalFinalizar" onclick="document.getElementById('idFin_PL').value = '<?php echo $id_pl; ?>'"><i class="fa-solid fa-xmark"></i></a>
                        <a href="#" title="Editar" class="text-info f-20"><i class="fa-solid fa-file-pen"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
    </tbody>
</table>
<?php
}
?>