import { useEffect, useState } from 'react';
import { ClienteService } from '../../services/clienteService';
import { Cliente } from '../../types/cliente';
import { 
  Container, 
  Lista, 
  ItemLista, 
  Cabecalho,
  MensagemCarregando,
  MensagemErro
} from './style';

export function ListaClientes() {
  const [clientes, setClientes] = useState<Cliente[]>([]);
  const [carregando, setCarregando] = useState(true);
  const [erro, setErro] = useState('');

  useEffect(() => {
    async function carregarClientes() {
      try {
        const dados = await ClienteService.listar();
        setClientes(dados);
      } catch (error) {
        setErro('Falha ao carregar clientes');
        console.error(error);
      } finally {
        setCarregando(false);
      }
    }

    carregarClientes();
  }, []);

  if (carregando) return <MensagemCarregando>Carregando...</MensagemCarregando>;
  if (erro) return <MensagemErro>{erro}</MensagemErro>;

  return (
    <Container>
      <h1>Clientes Cadastrados</h1>
    
      <Cabecalho>
        <span>Nome</span>
        <span>Email</span>
        <span>Telefone</span>
        <span>Logradouro</span>
        <span>Bairro</span>
        <span>Cidade/UF</span>
        <span>CEP</span>
      </Cabecalho>

      <Lista>
        {clientes.length === 0 ? (
          <ItemLista $vazio>
            <span>Nenhum cliente cadastrado</span>
          </ItemLista>
        ) : (
          clientes.map(cliente => (
            <ItemLista key={cliente.id}>
              <span>{cliente.nome}</span>
              <span>{cliente.email}</span>
              <span>{cliente.telefone}</span>
              <span>{cliente.logradouro}</span>
              <span>{cliente.bairro}</span>
              <span>{cliente.cidade}/{cliente.uf}</span>
              <span>{cliente.cep}</span>
            </ItemLista>
          ))
        )}
      </Lista>
    </Container>
  );
}