import styled from 'styled-components';

export const Container = styled.div`
  max-width: 1400px;
  margin: 0 auto;
  padding: 20px;
  overflow-x: auto;
`;

export const Lista = styled.ul`
  list-style: none;
  padding: 0;
  margin-top: 20px;
`;

export const ItemLista = styled.li<{ $vazio?: boolean }>`
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  gap: 10px;
  padding: 12px;
  border-bottom: 1px solid #eee;
  align-items: center;
  justify-content: ${props => props.$vazio ? 'center' : 'start'};
  grid-column: ${props => props.$vazio ? '1 / -1' : 'auto'};
  min-width: 1200px;

  &:hover {
    background-color:rgba(249, 249, 249, 0.27);
  }

  span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
`;

export const Cabecalho = styled.div`
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  gap: 10px;
  padding: 12px;
  font-weight: bold;
  background-color: #2c3e50;
  color: white;
  border-radius: 4px 4px 0 0;
  min-width: 1200px;

  span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
`;

export const MensagemCarregando = styled.p`
  text-align: center;
  padding: 20px;
  font-size: 1.2rem;
  color: #7f8c8d;
`;

export const MensagemErro = styled.p`
  text-align: center;
  padding: 20px;
  font-size: 1.2rem;
  color: #e74c3c;
`;