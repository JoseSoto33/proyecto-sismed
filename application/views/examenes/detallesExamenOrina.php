<div class="row">
    <div class="col-xs-12 col-sm-6">
        <table cellpadding="5" class="table table-bordered table-condensed table-hover" cellspacing="0" border="0" style="padding-left:50px;">
            <tr>
                <th colspan="2" class="info">
                    Análisis físico
                </th>
            </tr>
            <tr>
                <th class="active" width="50%">Aspecto</th>
                <td width="50%"><?php echo $aspecto; ?></td>
            </tr>
            <tr>
                <th class="active" width="50%">Color</th>
                <td width="50%"><?php echo $color; ?></td>
            </tr>
            <tr>
                <th class="active" width="50%">Cantidad</th>
                <td width="50%"><?php echo $cantidad; ?></td>
            </tr>
            <tr>
                <th class="active" width="50%">PH</th>
                <td width="33.33%"><?php echo $ph; ?></td>
            </tr>
            <tr>
                <th class="active" width="50%">Reacción</th>
                <td width="50%"><?php echo $reaccion; ?></td>
            </tr>
            <tr>
                <th class="active" width="50%">Densidad</th>
                <td width="50%"><?php echo $densidad; ?></td>
            </tr>
        </table>        
    </div>
    <div class="col-xs-12 col-sm-6">
        <table cellpadding="5" class="table table-bordered table-condensed table-hover" cellspacing="0" border="0" style="padding-left:50px;">
            <tr>
                <th colspan="4" class="info">
                    Análisis químico
                </th>
            </tr>
            <tr>
                <th width="50%" class="active">Acetona</th>
                <td width="50%"><?php echo $acetona; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Bilirrubina</th>
                <td width="50%"><?php echo $bilirrubina; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Glucosa</th>
                <td width="50%"><?php echo $glucosa; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Hemoglobina</th>
                <td width="50%"><?php echo $hemoglobina; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Proteínas</th>
                <td width="50%"><?php echo $proteinas; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Urobilinógeno</th>
                <td width="50%"><?php echo $urobilinogeno; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Nitritos</th>
                <td width="50%"><?php echo ($densidad == '+')? "Positivo" : "Negativo"; ?></td>
            </tr>
        </table>        
    </div>
     <div class="col-xs-12">
        <table cellpadding="5" class="table table-bordered table-condensed table-hover" cellspacing="0" border="0" style="padding-left:50px;">
            <tr>
                <th colspan="4" class="info">
                    Análisis microscópico
                </th>
            </tr>
            <tr>
                <th width="50%" class="active">Leucocitos</th>
                <td width="50%"><?php echo $leucocitos; ?> x cpo</td>
            </tr>
            <tr>
                <th width="50%" class="active">Hematíes</th>
                <td width="50%"><?php echo $hematies; ?> x cpo</td>
            </tr>
            <tr>
                <th width="50%" class="active">Células epiteliales</th>
                <td width="50%"><?php echo $cel_epiteliales; ?> x cpo</td>
            </tr>
            <tr>
                <th width="50%" class="active">Células redondas</th>
                <td width="50%"><?php echo $cel_redondas; ?> x cpo</td>
            </tr>
            <tr>
                <th width="50%" class="active">Cilindros</th>
                <td width="50%"><?php echo $cilindros; ?> x cpo</td>
            </tr>
            <tr>
                <th width="50%" class="active">Mucina</th>
                <td width="50%"><?php echo $mucina; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Bacterias</th>
                <td width="50%"><?php echo $bacterias; ?></td>
            </tr>
            <tr>
                <th width="50%" class="active">Cristales</th>
                <td width="50%"><?php echo $cristales; ?></td>
            </tr>
        </table>        
    </div>
</div>