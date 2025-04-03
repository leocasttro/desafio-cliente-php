// components/Sidebar.tsx
import { SidebarContainer, SidebarToggle, SidebarNav, SidebarLink, MenuLabel } from './SidebarStyles';
import { HamburgerIcon } from './HamburgerIcon';

interface SidebarProps {
  isOpen: boolean;
  toggleSidebar: () => void;
}

export function Sidebar({ isOpen, toggleSidebar }: SidebarProps) {
  return (
    <SidebarContainer $isOpen={isOpen}>
      <SidebarToggle onClick={toggleSidebar}>
        <HamburgerIcon $isOpen={isOpen} />
        {isOpen && <MenuLabel>Menu</MenuLabel>}
      </SidebarToggle>
      
      {isOpen && (
        <SidebarNav>
          <SidebarLink to='/clientes'>Listar Clientes</SidebarLink>
          <SidebarLink to='/clientes/cadastrar'>Cadastrar Cliente</SidebarLink>
        </SidebarNav>
      )}
    </SidebarContainer>
  );
}