# Updated: 2018-11-12
import React, { useState, useEffect } from 'react';

export default function Dashboard() {
  const [data, setData] = useState([]);
  useEffect(() => {
    fetch('/api/data').then(r => r.json()).then(setData);
  }, []);
  return <div className='dashboard'>{data.length} items</div>;
}