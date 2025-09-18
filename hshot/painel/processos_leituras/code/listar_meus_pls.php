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
                <th scope="col">Livro</th>
            <th scope="col">Título</th>
            <th scope="col">Desc/Obser</th>
            <th scope="col" width="200">Inicio / Fim</th>
            <th scope="col" width="200">Cap Restantes</th>
            <th scope="col">Status</th>
            <th scope="col" width="150"></th>
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

                $sql_caps = $pdo->query("SELECT * FROM capitulos WHERE id_c = '$id_l'");
                $res_caps = $sql_caps->fetchAll(PDO::FETCH_ASSOC);
                $total_caps = $res_caps[0]['quant_c'];

                $sql_caps_lidos = $pdo->query("SELECT * FROM pl_inserircap WHERE id_pl = '$id_pl' AND id_l = '$id_l' AND IP_mem_ic = '$_SESSION[IP_mem]'");
                $res_caps_lidos = $sql_caps_lidos->fetchAll(PDO::FETCH_ASSOC);
                $caps_lidos = 0;
                if (count($res_caps_lidos) > 0) {
                    for ($cont = 0;  $cont < count($res_caps_lidos); $cont++) {
                        $caps_lidos += $res_caps_lidos[$cont]['quant_ic'] ?? 0;
                    }
                }

                $data_ini = date('d/m/Y', strtotime($data_ini));
                $data_fim = $data_fim ? date('d/m/Y', strtotime($data_fim)) : '---';
                $desc_pl = (strlen($desc_pl) > 10) ? substr($desc_pl, 0, 10) . '...' : $desc_pl;

                if ($status_pl == 'Aberto') {
                    $status_pl_bg = 'bg-success text-white';
                } else {
                    $status_pl_bg = 'bg-danger text-white';
                }

                if (($total_caps - $caps_lidos) > 0) {
                    $modal_finalizar = '#ModalNaoFinalizar';
                } else {
                    $modal_finalizar = '#ModalFinalizar';
                }

                ?>
                <tr>
                    <td><?php echo $nome_l; ?></td>
                    <td><?php echo $titulo_pl; ?></td>
                    <td><?php echo $desc_pl; ?></td>
                    <td><?php echo $data_ini . ' / ' . $data_fim; ?></td>
                    <td><?php echo ($total_caps - $caps_lidos) . " Capítulos"?></td>
                    <td class="<?php echo $status_pl_bg; ?>"><?php echo $status_pl; ?></td>
                    <td>
                        <a href="#" title="Excluir" class="text-dark f-20" data-bs-toggle="modal" data-bs-target="#ModalConfirmDel" onclick="document.getElementById('idDel_PL').value = '<?php echo $id_pl; ?>'"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" title="Finalizar Precesso" class="text-danger f-20" data-bs-toggle="modal" data-bs-target="<?php echo $modal_finalizar; ?>" onclick="document.getElementById('idFin_PL').value = '<?php echo $id_pl; ?>'"><i class="fa-solid fa-xmark"></i></a>
                        <a href="#" title="Visualizar" class="text-primary f-20" data-bs-toggle="modal" data-bs-target="#ModalInfo" onclick="infoPL('<?php echo $id_pl; ?>')"><i class="fa-solid fa-eye"></i></a>
                        <?php 
                            if ($status_pl == 'Aberto') {
                                echo '<a href="#" title="Inserir Capítulos" class="text-success f-20" data-bs-toggle="modal" data-bs-target="#ModalInserirCap" onclick="document.getElementById(\'idInsCap_PL\').value = \'' . $id_pl . '\'; document.getElementById(\'idLivro\').value = \'' . $id_l . '\'"><i class="fa-solid fa-plus"></i></a>';
                            }
                        ?>
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