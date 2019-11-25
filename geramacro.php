<?php 
    include_once('index.html');
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        $idioma =  $_POST['language'];
        $name = $_POST['name'];
        $target = $_POST['target'];
        $school = $_POST['school'];
        $level = $_POST['level'];
        $cmpnts = $_POST['cmpnts'];
        $casstime = $_POST['casttime'];
        $range = $_POST['range'];
        if($_POST['spfrange']!= ''){
            $range = $_POST['spfrange'];
        }
        $spfTarget = $_POST['specified-target'];
        $duration = $_POST['duration'];
        $svthrow = $_POST['svthrow'];
        $spellresist = $_POST['spellresist'];
        $note = $_POST['note'];
        //checaTarget($target);
        if($language = 'en'){
            $macro = "&{template:DnD35StdRoll} 
            {{spellflag=true}} 
            {{name= @{character_name} casts $name".checaTarget($target)."
            {{School:=$school}}
            {{Level: =$level}} 
            {{Cmpnts:=$cmpnts}} {{Casting Time:= $casstime}} 
            {{Range:=".checaRange($range)."}}
            {{Target:= $spfTarget}} 
            {{Duration:= $duration}} 
            
            {{Saving Throw:= $svthrow
                (DC= [[ @{spelldc1}+@{sf-$school} ]] ) }}
                
            {{Spell Resist.:= $spellresist }} 
            {{Caster level check: = [[ 1d20+@{casterlevel}+@{spellpen} ]] vs spell resistance.}} 
            {{compcheck= Conc: [[{1d20 + [[ @{concentration} ]] }>?{[CONCENTRATION DC:]: Concentration DC=15+Spell Level or 10+Damage Received|16} ]] }}
             {{succeedcheck=Success! BRAD!}} 
             {{failcheck=Fail ;-; }} 
             {{notes=
                $note}} 
            ";

        }
        if($language = 'pt'){
            $macro = "&{template:DnD35StdRoll} 
            {{spellflag=true}} 
            {{name= @{character_name} conjura $name ".checaTarget($target)."
            {{Escola:=$school}}
            {{Level: =$level}} 
            {{Componentes:=$cmpnts}} {{Tempo de Conjuração:= $casstime}} 
            {{Alcance:=".checaRange($range)."}}
            {{Alvos:= $spfTarget}} 
            {{Duração:= $duration}} 
            
            {{Teste de Resistência:= $svthrow
                (DC= [[ @{spelldc1}+@{sf-$school} ]] ) }}
                
            {{Resistência à Magia:= $spellresist }} 
            {{Caster level check: = [[ 1d20+@{casterlevel}+@{spellpen} ]] vs spell resistance.}} 
            {{compcheck= Concentração (caso necessário): [[{1d20 + [[ @{concentration} ]] }>?{[CD DA CONCENTRAÇÃO:]: Concentration DC=15+Spell Level or 10+Damage Received|16} ]] }}
             {{succeedcheck=Successo! BRAD!}} 
             {{failcheck=Falhou ;-; }} 
             {{notes=<br>
                $note}} 
            ";

        }
        echo "<div><p>$macro</p></div> ";
    }

    function checaTarget($target){
        if ($_POST['language'] == 'en'){
            $resposta = ($target == 'you' ? 'in himself}}' : ($target == 'other' ? 'on @{target|token_name} }}' : '}}')); 
            return $resposta;
        }
        if ($_POST['language'] == 'pt'){
            $resposta = ($target == 'you' ? 'em si mesmo}}' : ($target == 'no' ? '}}' : ($target == 'other' ? 'em @{target|token_name} }}' : '}}'))); 
            return $resposta;
        }
    }
  
    function checaRange($range){
        if ($_POST['language'] == 'en'){
            $resposta = ($range == 'touch' ? 'Touch}}' : ($range == 'close' ? 'Close ( [[ 7.5+1.5*floor(@{casterlevel}/2)]] m)}}' : 
               ($range == 'medium' ? 'Medium ([[ 30+3*@{casterlevel}]] m)}}' : ($range == 'long' ? 'Long ( [[120+12*@{casterlevel}]] m)': "$range}}")))); 
            //echo "$resposta";
        }
        if ($_POST['language'] == 'pt'){
            $resposta = ($range == 'touch' ? 'Toque}}' : ($range == 'close' ? 'Curto ( [[ 7.5+1.5*floor(@{casterlevel}/2)]] m)}}' : 
               ($range == 'medium' ? 'Médio ([[ 30+3*@{casterlevel}]] m)}}' : ($range == 'long' ? 'Longo ( [[120+12*@{casterlevel}]] m)': "$range}}")))); 
            return $resposta;
        }
    }