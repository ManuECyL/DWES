<?

if(!isset($_SESSION['intentos'])){
    if(!empty($_REQUEST['numero']))
        $palrabra = PalabraDAO::findRandomN($_REQUEST['numero']);
    else
        $palrabra = PalabraDAO::findRandom();
    $palrabra = json_decode($palrabra,true);
    $_SESSION['id_palabra'] = $palrabra['id_palabra'];
    $_SESSION['palabra'] = str_split($palrabra['palabra']);
    $_SESSION['oculta'] = array();
    for ($i=0; $i < $palrabra['num_letras']; $i++) { 
        array_push($_SESSION['oculta'],'*');
    }
    $_SESSION['intentos'] = 6;
}else{
    if(isset($_REQUEST['pletra'])){
        $cambios = 0;
        for ($i=0; $i < count($_SESSION['palabra']); $i++) { 
            if($_SESSION['palabra'][$i] == $_REQUEST['letra']){
                $_SESSION['oculta'][$i] = $_REQUEST['letra'];
                $cambios++;
            }
        } 
        if($cambios==0){
            $_SESSION['intentos'] --;
        }
        if($_SESSION['intentos']== 0)
        {
            $estadistica = new Estadistica($_SESSION['usuarioDAW205POO']->id
            ,$_SESSION['id_palabra'],
            'perdida',
            6 );
            
            EstadisitcaPDO::insert($estadistica);
            $_SESSION['pagina'] = 'inicioL';
            $_SESSION['vista'] = $vistas['inicioL'];
            $_SESSION['controlador'] =$controladores['inicioL'];
            $sms = "Ha perdido, la palabra era:" . implode($_SESSION['palabra']);
            $partidasJugadas = EstadisitcaPDO::findByUser($_SESSION['usuarioDAW205POO']->id);
            $partidasJugadas = json_decode($partidasJugadas,true);
            unset($_SESSION['intentos']);
        }else{
            $acertado = true;
            for ($i=0; $i < count($_SESSION['palabra']); $i++) { 
                if($_SESSION['palabra'][$i] != $_SESSION['oculta'][$i]){
                    $acertado = false;
                    break;
                }
            } 
            if($acertado){
                $estadistica = new Estadistica($_SESSION['usuarioDAW205POO']->id,$_SESSION['id_palabra'],'ganada',6-$_SESSION['intentos'] );
                EstadisitcaPDO::insert($estadistica);
                unset($_SESSION['intentos']);
                $sms = "Enorabuena ha acertado: " . implode($_SESSION['palabra']);
                $_SESSION['vista'] = $vistas['inicioL'];
                $_SESSION['controlador'] =$controladores['inicioL'];
                $_SESSION['pagina'] = 'inicioL';
                $partidasJugadas = EstadisitcaPDO::findByUser($_SESSION['usuarioDAW205POO']->id);
                $partidasJugadas = json_decode($partidasJugadas,true);
            }
        }
    }
}
require './vista/layout.php';

