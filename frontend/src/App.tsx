import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { Layout } from './components/Layout';
import { ListaClientes } from './pages/Clientes/ListarClientes';
import { CadastroCliente } from '../src/pages/Clientes/CadastroClientes';
import './styles/global.css';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route path="clientes" element={<ListaClientes />} />
          <Route path="clientes/cadastrar" element={<CadastroCliente />} />
        </Route>
      </Routes>
    </Router>
  );
}

export default App;