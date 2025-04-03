export interface Cliente {
  id?: number;
  nome: string;
  email: string;
  telefone: string;
  cep?: string;
  cidade?: string;
  logradouro?: string;
  uf?: string;
  bairro?: string
}