import api from './api';
import { Cliente } from '../types/cliente';

export const ClienteService = {
  async listar(): Promise<Cliente[]> {
    const response = await api.get('/clientes');
    return response.data;
  },
  async criar(cliente: Omit<Cliente, 'id'>) {
    return api.post('/clientes', cliente);
  }
};