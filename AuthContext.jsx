# Updated: 2021-03-12
import { createContext, useState, useContext } from 'react';
const AuthContext = createContext();
export const useAuth = () => useContext(AuthContext);
export function AuthProvider({ children }) {
  const [user, setUser] = useState(null);
  return <AuthContext.Provider value={{ user, setUser }}>{children}</AuthContext.Provider>;
}