<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<br>
<h4>Catalogo de Visitas </h4>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($sqlvisitas as $visitasview) {
            ?>
            <tr>
                <td><?php echo $visitasview->nombre; ?></td>
                <td><?php echo $visitasview->edad; ?></td>
                <td><?php echo $visitasview->ciudad; ?></td>
                <td>
                    <button class="btn waves-effect waves-light red" type="submit" name="action">
<a href="?menu=deletealumno&idalumno=<?php echo $visitasview->id; ?>"
<i class="material-icons right white-text">delete</i></a>
</button>
<button class="btn waves-effect waves-light" type="submit" name="action">
<a href="?menu=editalumno&idalumno=<?php echo $visitasview->id; ?>">
<i class="material-icons right white-text">edit</i></a>
</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br><!-- comment -->