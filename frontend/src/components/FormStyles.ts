import styled from 'styled-components';

export const FormContainer = styled.div`
  max-width: 800px;
  margin: 2rem auto;
  padding: 2rem;
  background-color: #1e293b;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  color: #e2e8f0;
  font-family: 'Inter', sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
`;

export const FormGroup = styled.div`
  margin-bottom: 1.5rem;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
`;

export const FormLabel = styled.label`
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 500;
  color: #94a3b8;
  width: 90%; 
  text-align: left;
`;

export const FormInput = styled.input`
  width: 90%; 
  padding: 0.75rem;
  background-color: #334155;
  border: 1px solid #475569;
  border-radius: 6px;
  color: #f8fafc;
  font-family: 'Inter', sans-serif;
  transition: border-color 0.2s;
  font-size: 1rem; 

  &:focus {
    outline: none;
    border-color: #60a5fa;
    box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.3);  
  }

  &::placeholder {
    color: #94a3b8;
    font-size: 0.9rem;  
  }
`;

export const FormButton = styled.button`
  width: 90%;
  padding: 0.85rem;
  background-color: #3b82f6;
  color: white;
  border: none;
  border-radius: 6px;
  font-weight: 500;
  font-size: 1rem;
  font-family: 'Inter', sans-serif;
  cursor: pointer;
  transition: all 0.2s;
  margin-top: 1.5rem;

  &:hover {
    background-color: #2563eb;
    transform: translateY(-1px);
  }

  &:active {
    background-color: #1d4ed8;
    transform: translateY(0);
  }
`;

export const ErrorMessage = styled.div`
  color: #f87171;
  margin-top: 1rem;
  padding: 0.75rem;
  background-color: rgba(248, 113, 113, 0.1);
  border-radius: 6px;
  text-align: center;
  width: 75%;
`;

export const SuccessMessage = styled.div`
  color: #4ade80;
  margin-top: 1rem;
  padding: 0.75rem;
  background-color: rgba(74, 222, 128, 0.1);
  border-radius: 6px;
  text-align: center;
  width: 75%;
`;