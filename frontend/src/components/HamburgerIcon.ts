// components/HamburgerIcon.tsx
import styled from 'styled-components';

interface HamburgerIconProps {
  $isOpen: boolean;
}

export const HamburgerIcon = styled.span<HamburgerIconProps>`
  display: inline-block;
  width: 20px;
  height: 2px;
  background: ${props => props.$isOpen ? 'transparent' : 'white'};
  position: relative;
  transition: all 0.3s;
  margin-right: 10px;

  &::before, &::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 2px;
    background: white;
    transition: all 0.3s;
    left: 0;
  }

  &::before {
    top: ${props => props.$isOpen ? '0' : '-6px'};
    transform: ${props => props.$isOpen ? 'rotate(45deg)' : 'rotate(0)'};
  }

  &::after {
    top: ${props => props.$isOpen ? '0' : '6px'};
    transform: ${props => props.$isOpen ? 'rotate(-45deg)' : 'rotate(0)'};
  }
`;