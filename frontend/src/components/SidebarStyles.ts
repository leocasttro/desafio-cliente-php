import styled from 'styled-components';
import { Link } from 'react-router-dom';

interface SidebarContainerProps {
  $isOpen: boolean;
}

export const MainContent = styled.main<{ $sidebarOpen: boolean }>`
  flex: 1;
  padding: 20px;
  margin-left: ${props => props.$sidebarOpen ? '250px' : '60px'};
  transition: margin-left 0.3s ease;
`;

export const SidebarContainer = styled.div<SidebarContainerProps>`
  width: ${props => props.$isOpen ? '250px' : '60px'};
  background-color: #2c3e50;
  color: white;
  transition: width 0.3s ease;
  position: relative;
  min-height: 100vh;
`;

export const SidebarToggle = styled.button`
  display: flex;
  align-items: center;
  width: 100%;
  padding: 15px;
  background: none;
  border: none;
  color: white;
  cursor: pointer;
  font-size: 1rem;
  transition: background-color 0.3s;

  &:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }
`;

export const MenuLabel = styled.span`
  font-weight: bold;
`;

export const SidebarNav = styled.nav`
  padding: 10px 0;
  display: flex;
  flex-direction: column;
`;

export const SidebarLink = styled(Link)`
  color: white;
  text-decoration: none;
  padding: 12px 20px;
  transition: background-color 0.3s;

  &:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  &.active {
    background-color: #3498db;
    font-weight: bold;
  }
`;