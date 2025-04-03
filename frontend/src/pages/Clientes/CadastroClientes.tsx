// pages/CadastroCliente.tsx
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { ClienteService } from '../../services/clienteService';
import { Cliente } from '../../types/cliente';
import { 
  FormContainer, 
  FormGroup, 
  FormLabel, 
  FormInput, 
  FormButton, 
  ErrorMessage,
  SuccessMessage 
} from '../../components/FormStyles';

export function CadastroCliente() {
  const [cliente, setCliente] = useState<Omit<Cliente, 'id'>>({ 
    nome: '', 
    email: '', 
    telefone: '',
    cep: ''
  });
  const [erro, setErro] = useState('');
  const [sucesso, setSucesso] = useState('');
  const navigate = useNavigate();

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    
    // Formatação automática do CEP
    if (name === 'cep') {
      const formattedValue = value
        .replace(/\D/g, '') // Remove tudo que não é dígito
        .replace(/(\d{5})(\d)/, '$1-$2') // Adiciona hífen depois do 5º dígito
        .slice(0, 9); // Limita o tamanho
      
      setCliente(prev => ({ ...prev, [name]: formattedValue }));
      return;
    }
    
    setCliente(prev => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setErro('');
    setSucesso('');

    // Validação básica do CEP
    if (cliente.cep && cliente.cep.length < 9) {
      setErro('CEP inválido');
      return;
    }

    try {
      await ClienteService.criar(cliente);
      setSucesso('Cliente cadastrado com sucesso!');
      setTimeout(() => navigate('/clientes'), 2000);
    } catch (error) {
      setErro('Erro ao cadastrar cliente');
      console.error(error);
    }
  };

  return (
    <FormContainer>
      <h2>Cadastrar Novo Cliente</h2>
      
      <form onSubmit={handleSubmit}>
        <FormGroup>
          <FormLabel>Nome:</FormLabel>
          <FormInput
            type="text"
            name="nome"
            value={cliente.nome}
            onChange={handleChange}
            required
            placeholder="Digite o nome completo"
          />
        </FormGroup>
        
        <FormGroup>
          <FormLabel>Email:</FormLabel>
          <FormInput
            type="email"
            name="email"
            value={cliente.email}
            onChange={handleChange}
            required
            placeholder="exemplo@email.com"
          />
        </FormGroup>
        
        <FormGroup>
          <FormLabel>Telefone:</FormLabel>
          <FormInput
            type="text"
            name="telefone"
            value={cliente.telefone}
            onChange={handleChange}
            required
            placeholder="(00) 00000-0000"
          />
        </FormGroup>

        <FormGroup>
          <FormLabel>CEP:</FormLabel>
          <FormInput
            type="text"
            name="cep"
            value={cliente.cep}
            onChange={handleChange}
            placeholder="00000-000"
            maxLength={9}
          />
        </FormGroup>
        
        <FormButton type="submit">Cadastrar</FormButton>
      </form>

      {erro && <ErrorMessage>{erro}</ErrorMessage>}
      {sucesso && <SuccessMessage>{sucesso}</SuccessMessage>}
    </FormContainer>
  );
}