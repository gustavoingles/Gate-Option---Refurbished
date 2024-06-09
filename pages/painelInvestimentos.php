<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/images/ico.ico">
    <link rel="stylesheet" href="../assets/styles/painelInvestimentos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <title>Menu de Investimentos</title>
</head>
<body>
    <header>
        <div class="barra-navegacao">
            <img id="logo-site" src="../assets/images/gateOption.png" alt="Logo do projeto e do site">
            <a href="portfolioAcoes.php"><button id="botao-sair" >Voltar</button></a>
        </div>
        <div class="cabecalho-site">
            <h1>Chegou sua <span>hora de investir!</span></h1>
            <p>Finalmente chegou a sonhada hora de investirmos juntos no seu futuro. Abaixo iremos te mostrar as empresas disponíveis <br>e informações relacionadas as mesmas.</p>
            <h1 id="segundo-h1">Suas opções de escolha:</h1>
        </div>
    </header>
    <main>
        <div class="menu-escolhas">
            <ul>
                <li><img src="../assets/images/logo-petrobras.png" alt="Logo da empresa Petrobrás"></li>
                <li><img src="../assets/images/logo-itau.png" alt="Logo da empresa Itaú Unibanco"></li>
                <li><img src="../assets/images/logo-vale.png" alt="Logo da empresa Vale"></li>
                <li><img src="../assets/images/logo-ambev.png" alt="Logo da empresa Ambev"></li>
                <li><img src="../assets/images/logo-btg.png" alt="Logo da empresa BTG Pactual"></li>
                <li><img src="../assets/images/logo-banco-do-brasil.png" alt="Logo da empresa Banco do Brasil"></li>
                <li><img src="../assets/images/logo-weg.png" alt="Logo da empresa WEG"></li>
                <li><img src="../assets/images/logo-bradesco.png" alt="Logo da empresa Bradesco"></li>
                <li><img src="../assets/images/logo-santander.png" alt="Logo da empresa Santander"></li>
                <li><img src="../assets/images/logo-itausa.png" alt="Logo da empresa Itaúsa"></li>
            </ul>
        </div>
        <div class="formulario">
            <form action="painelInvestimentos.php" method="POST">
                <legend>Painel de Investimentos</legend>
                <label for="deposito">Digite o quanto deseja depositar</label>
                <input type="number" name="depositoNum" id="" value="<?=$deposito?>">
                <label for="numero">Escolha alguma opção:</label>
                <select name="decida" class="input-dropdown">
                    <option selected disabled style="color: gray" value="invalido"></option>
                    <option value="1">Petrobrás</option>
                    <option value="2">Itaú Unibanco</option>
                    <option value="3">Vale</option>
                    <option value="4">Ambev</option>
                    <option value="5">BTG</option>
                    <option value="6">Banco do Brasil</option>
                    <option value="7">WEG</option>
                    <option value="8">Bradesco</option>
                    <option value="9">Santander</option>
                    <option value="10">Itaúsa</option>
                </select>
                <label for="investir">Quanto deseja investir ?</label>
                <input type="number" name="investir" id="investir" value="<?=$investir?>">
                <label for="">Tempo do investimento</label>
                <input type="number" name="tempo" id="idtempo" placeholder="Em meses" value="<?=$tempo?>">
                <input type="submit" name="submit" value="Investir" id="botao-submit" class="butao">
            </form>
        </div>
    </main>

    <?php
        class Investidor {
            public $empresa;
            public $opcao;
            public $valorEmpresa;
            public $investir;
            public $tempo;
            public $deposito;
            public $possui;
            public $MinhasAcoes;
            public $lucroMensal;
            public $jurosMensal;
            public $AcoesEmpresa;
            public $ValorAcoes;
            public $investindo;
            private $pdo;
            
            public function __construct($pdo)
            {
                $this->pdo = $pdo;
            }

            public function EnviarDados() {
                $this->opcao = $_POST["decida"] ?? null;
                $this->investir = $_POST["investir"] ?? null;
                $this->tempo = $_POST["tempo"] ?? null;
                $this->deposito = $_POST['depositoNum'] ?? null;
                
            }
            public function ValorInvestido(){
                if ($this->deposito >= $this->investir){
                    $this->possui = $this->deposito - $this->investir;
                    $this->investindo = true;
                }
                else {
                    $this->investindo = false;
                }
            }

            public function Depositar() {
                
            }

            public function Calculo() {
                if ($this->opcao == 1){
                    $this->valorEmpresa = 568000000000;
                    $this->empresa = "Petrobras";
                    $this->ValorAcoes = 36;
                    $this->AcoesEmpresa = 15777777778;
                    $this->MinhasAcoes = intdiv($this->investir,$this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * 1.69) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * -2.18) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * 12.13) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * 27.06) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * 30.83) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * 37.01) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 36.20) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 47.79) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 36.47) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 51.09) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * 61.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 67.34) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
        
        
                }
                elseif ($this->opcao == 2){
                    $this->valorEmpresa = 315000000000;
                    $this->empresa = "Itaú Unibanco";
                    $this->ValorAcoes = 33.3;
                    $this->AcoesEmpresa = 9459459459;
                    $this->MinhasAcoes = intdiv($this->investir,$this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * 5.13) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * 4.94) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * 18.79) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * 19.86) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * 11.56) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * 7.12) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 5.89) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 23.53) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 30.19) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 25.04) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * 28.75) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 30.12) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    

                }
                elseif ($this->opcao == 3){
                    $this->empresa = "Vale";
                    $this->valorEmpresa = 309000000000;
                    $this->ValorAcoes = 61.17;
                    $this->AcoesEmpresa = 5051495831.2;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * -11.86) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * -11.56) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * -4.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * -10.12) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * -6.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * -4.12) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 3.56) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 11.76) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * -1.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * -2.89) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * -4.8) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 2.89) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }
                elseif ($this->opcao == 4){
                    $this->empresa = "Ambev";
                    $this->valorEmpresa = 201000000000;
                    $this->ValorAcoes = 12.39;
                    $this->AcoesEmpresa = 16222760290.5;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * -0.36) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * 13.20) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * 12.89) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * 1.78) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * -4.78) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * -5.99) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 3.52) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 6.1) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 1.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * -2.78) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * -2.89) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * -4.55) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }
                elseif ($this->opcao == 5){
                    $this->empresa = "BTG";
                    $this->valorEmpresa = 169000000000;
                    $this->ValorAcoes = 36;
                    $this->AcoesEmpresa = 4694444444.4;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * -6.60) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * -8.24) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * -10.24) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * -20.46) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * -10.14) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * -5.56) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * -9.47) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * -7.92) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 1.56) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 2.85) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * -2.30) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 7.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }   
                elseif ($this->opcao == 6){
                    $this->empresa = "Banco do Brasil";
                    $this->valorEmpresa = 165000000000;
                    $this->ValorAcoes = 55.30;
                    $this->AcoesEmpresa = 2983725135.6;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * 13.46) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * 11.01) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * 10.92) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * 11.12) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * 13.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * 29.40) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 31.93) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 33.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 37.12) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 36.47) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * 32.23) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 30.41) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }                
                elseif ($this->opcao == 7){
                    $this->empresa = "WEG";
                    $this->valorEmpresa = 140000000000;
                    $this->ValorAcoes = 39.77;
                    $this->AcoesEmpresa = 3520241387.9;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * -8.54) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * -8) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * -3.13) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * -13.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * -12.14) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * -8.56) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * -1.56) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * -13.79) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 1.5) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 5.96) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * 8.47) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 11.78) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }
                elseif ($this->opcao == 8){
                    $this->empresa = "Bradesco";
                    $this->valorEmpresa = 136000000000;
                    $this->ValorAcoes = 13.98;
                    $this->AcoesEmpresa = 9728183118.7;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * 7.00) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * 18.83) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * 20.13) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * 9.78) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * 4.98) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * 2.06) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 18.25) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 25.25) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 14.78) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 4.69) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * 8.27) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 5.29) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }
                elseif ($this->opcao == 9){
                    $this->empresa = "Santander";
                    $this->valorEmpresa = 109000000000;
                    $this->ValorAcoes = 23.48;
                    $this->AcoesEmpresa = 4642248722.3;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * -7.49) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * 8.09) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * 16.72) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * 12.75) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * 9.91) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * 6.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 19.67) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 20.4) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 17.02) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 19.77) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * 37.53) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 36.45) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }
                elseif ($this->opcao == 10){
                    $this->empresa = "Itaúsa";
                    $this->valorEmpresa = 108000000000;
                    $this->ValorAcoes = 10.34;
                    $this->AcoesEmpresa = 10444874274.6;
                    $this->MinhasAcoes = intdiv($this->investir, $this->ValorAcoes);
                    if ($this->tempo == 1){
                        $this->jurosMensal = (($this->investir * 1.14) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 2){
                        $this->jurosMensal = (($this->investir * 12.53) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 3){
                        $this->jurosMensal = (($this->investir * 15) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 4){
                        $this->jurosMensal = (($this->investir * 9.74) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 5){
                        $this->jurosMensal = (($this->investir * 8.93) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 6){
                        $this->jurosMensal = (($this->investir * 4.96) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 7){
                        $this->jurosMensal = (($this->investir * 23.43) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 8){
                        $this->jurosMensal = (($this->investir * 29.79) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 9){
                        $this->jurosMensal = (($this->investir * 26.22) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 10){
                        $this->jurosMensal = (($this->investir * 29.22) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 11){
                        $this->jurosMensal = (($this->investir * 31.16) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                    elseif ($this->tempo == 12){
                        $this->jurosMensal = (($this->investir * 22.21) / 100);
                        $this->lucroMensal = $this->jurosMensal + $this->investir;
                    }
                }  
            }

            public function Mostrar(){
                if ($this->investindo == true){
                    print "Você investiu R$ ". number_format($this->investir, 0, ',','.') . " na empresa $this->empresa, que possui R$ " . number_format($this->valorEmpresa, 0,',','.') . " de valor de mercado<br>";
                    print "Você comprou $this->MinhasAcoes ações <br>";
                    print "Você possui saldo de $this->possui <br>";
                    print "Você deixou por $this->tempo mês, seu saldo é de R$ " . number_format($this->lucroMensal, 0, ',', '.');
                }
                else {
                    print "Valor investido<br>";
                }
            }

            public function Ordem(){
                $this->EnviarDados();
                $this->ValorInvestido();
                $this->Calculo();
                $this->enviarBanco();
                //$this->Mostrar();
            }
            public function Ordem1(){
                $this->EnviarDados();
                $this->ValorInvestido();
                $this->Calculo();
                $this->Mostrar();
            }

            public function conectaBaco(){
                $dbHost = 'Localhost';
                $dbUsername = 'root';
                $dbPassword = '';
                $dbName = 'dados_cadastro';

                $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            }
            public function enviarBanco(){
                if(isset($_POST['submit'])){

                    $investir = $_POST['investir'];
                    $tempo = $_POST['tempo'];

                    $sql = "INSERT INTO dados_investimento(empresa, investir, minhasacoes, lucromensal, tempo) VALUES (:empresa, :investir,:MinhasAcoes,:lucroMensal, :tempo)";

                    
                    $stmt = $this->pdo->prepare($sql);
                    $stmt->bindParam(':empresa', $this->empresa, PDO::PARAM_STR);
                    $stmt->bindParam(':investir', $investir, PDO::PARAM_STR);
                    $stmt->bindParam(':MinhasAcoes', $this->MinhasAcoes, PDO::PARAM_STR);
                    $stmt->bindParam(':lucroMensal', $this->lucroMensal, PDO::PARAM_STR);
                    $stmt->bindParam(':tempo', $tempo, PDO::PARAM_STR);

                    // Executa a consulta dentro de um bloco try-catch
                    try {
                        $stmt->execute();
                        //echo "Registro inserido com sucesso!";
                    } catch (PDOException $e) {
                        //echo 'Erro ao inserir registro: ' . $e->getMessage();
                    }
                }    
                        
            }    
            
        }
        //$investidor1 = new Investidor();
        //$investidor1->Ordem();
        $dsn = 'mysql:host=localhost;dbname=dados_cadastro';
        $username = 'root';
        $password = '';
    

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexão bem-sucedida!<br>";
        } catch (PDOException $e) {
            //echo 'Conexão falhou: ' . $e->getMessage();
            exit;
        }

        // Criando uma instância da classe e enviando os dados ao banco de dados
        $obj = new Investidor($pdo);
        $obj->EnviarDados();
        $obj->ValorInvestido();
        $obj->Calculo();
        $obj->enviarBanco($pdo);
?>

    
</body>
</html>