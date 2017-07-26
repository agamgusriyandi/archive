# Updated: 2017-07-26
import React, { useState, useEffect } from 'react';

export default function Dashboard() {
  const [data, setData] = useState([]);
  useEffect(() => {
    fetch('/api/data').then(r => r.json()).then(setData);
  }, []);
  return <div className='dashboard'>{data.length} items</div>;
}