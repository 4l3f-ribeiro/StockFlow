$(document).ready(function() {
    
    
    $('#telefone').mask('(00) 00000-0000');

   
    function validarCampo(id) {
        const $campo = $('#' + id);
        if ($campo.length === 0) {
            console.warn(`Campo ${id} não encontrado!`);
            return true; 
        }

        const valorBruto = $campo.val().trim();
        let errorElement = $('#error-' + id);

        if (errorElement.length === 0) {
            errorElement = $('<span id="error-' + id + '" style="color:red; display:block; font-size:0.9em;"></span>');
            $campo.after(errorElement);
        }
        errorElement.text('');

        

        if (!valorBruto) {
            errorElement.text('Campo obrigatório');
            return false;
        }

        switch(id) {
            case 'cnpj':
               
                let cnpj = valorBruto.replace(/\D/g, '');
                if (cnpj.length !== 14) {
                    errorElement.text('CNPJ inválido (14 dígitos numéricos)');
                    return false;
                }
                
                break;
            case 'telefone':
                let telefone = valorBruto.replace(/\D/g, '');
                if (telefone.length < 10 || telefone.length > 11) {
                    errorElement.text('Telefone inválido (10 ou 11 dígitos)');
                    return false;
                }
                break;
            case 'email':
                const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regexEmail.test(valorBruto)) {
                    errorElement.text('Email inválido');
                    return false;
                }
                break;
            case 'nome_fantasia':
                if (valorBruto.length < 3) {
                    errorElement.text('Nome Fantasia muito curto');
                    return false;
                }
                break;

                
        }
        return true;
    }

    
    function validarFormulario() {
        const campos = ['email', 'nome_fantasia', 'telefone', 'cnpj'];
        let valido = true;
        campos.forEach(function(id) {
            if (!validarCampo(id)) {
                valido = false;
            }
        });
        return valido;
    }

    $('#btnAtualizar').click(function(e) {
        e.preventDefault();
        if (validarFormulario()) {
            $('#Perfil').attr('action', 'PHP/confirmarAtualizarEmpresa.php');
            $('#Perfil').submit();
        } else {
            alert('Por favor, corrija os erros no formulário antes de atualizar.');
        }
    });
     $('#btnDeletar').click(function(e) { e.preventDefault(); if (confirm('Tem certeza que deseja deletar a empresa? Esta ação não pode ser desfeita.')) { 
        $('#Perfil').attr('action', 'PHP/confirmarDeletarEmpresa.php'); 
        $('#Perfil').submit(); 
    } 
});
});
