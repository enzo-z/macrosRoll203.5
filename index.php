<html>
    <head>
        <meta charset="UTF-8">
        <title>Macros Spells</title>
    </head>
    <body>
        <div id='formularios'>
            <p>Entre com as informações a respeito da magia!</p>
            <form action="geramacro.php" method="POST">
                Selecione o idioma que você estará inserindo! 
                <input type="radio" name='language' value='en'>Inglês
                <input type="radio" name='language' value='pt'>Português
                <br>
                Nome da magia | Name of your spell: <input type="text" name="name" placeholder="Type the name of your spell">
                <br>
                Possui target? 
                <input type="radio" name="target" value='you'>Você mesmo é o alvo da magia
                <input type="radio" name="target" value='other'>Target é outra pessoa
                <input type="radio" name="target" value='no'>Não possui target (ou é uma área ou objeto)
                <br>
                <br>
                Escola da Magia:
                <input type="radio" name="school" value="Abjuration">Abjuração
                <input type="radio" name="school" value="Divination">Adivinhação
                <input type="radio" name="school" value="Conjuration">Conjuração
                <input type="radio" name="school" value="Enchantment">Encantamento
                <input type="radio" name="school" value="Evocation">Evocação
                <input type="radio" name="school" value="Illusion">Ilusão
                <input type="radio" name="school" value="Necromancy">Necromancia
                <input type="radio" name="school" value="Transmutation">Transmutação
                <br>
                Nível da Magia (e da classe): <input type="text" name='level'>  ex: "Mago nível 1 | Wizard level 1"
                <br>
                Componentes: <input type="text" name=cmpnts> ex: V, S, M, SF. Caso possua componente M que valha gold, descreva! Ex: M (10 gp)
                <br>
                Casting time (tempo de casting): <input type="text" name='casttime'>
                <br>
                <br>
                Range (escolha entre close [perto], médio[medium], longo[long] ou digite um range próprio em metros): <br>
                <input type="radio" name='range' value='touch'>Touch
                <input type="radio" name='range' value='close'>Close 
                <input type="radio" name='range' value='medium'>Medium
                <input type="radio" name='range' value='long'>Long 
                <br>
                Outro (m):
                <input type="text" name='spfrange' placeholder="Deixe em branco caso seja um dos anteriores" style = "width: 300;">
                <br>
                <br>
                Target (alvo): <input type="text" name='specified-target' placeholder='Ex: Uma criatura viva / one living creature' style="width: 400px">
                <br>
                Duration (duração): <input type="text" name='duration'>
                <br>
                Saving throw (teste de resistência): <input type="text" name='svthrow'>
                <br>
                Spell Resistance (Resisntência a Magia): <input type="text" name='spellresist'>
                <br>
                Efeito da Magia (description of the spell): <input type="text" name='note' id='note' placeholder="Isso será o que irá aparecer" style='width: 400px;'>
                <br>
                <button type="submit">Gerar Macro</button>
            </form>
        </div>
        
    </body>

</html>