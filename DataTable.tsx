// Updated: 2018-07-18
import React, { useState, useMemo } from "react";

interface Column<T> {
  key: keyof T;
  label: string;
  render?: (val: T[keyof T], row: T) => React.ReactNode;
  sortable?: boolean;
}

interface Props<T> {
  data: T[];
  columns: Column<T>[];
  pageSize?: number;
  searchable?: boolean;
}

function DataTable<T extends { id: string | number }>({ data, columns, pageSize = 10, searchable = true }: Props<T>) {
  const [page, setPage] = useState(1);
  const [search, setSearch] = useState("");
  const [sort, setSort] = useState<{ key: keyof T; dir: "asc" | "desc" } | null>(null);

  const filtered = useMemo(() => {
    let d = search ? data.filter(r =>
      Object.values(r as object).some(v => String(v).toLowerCase().includes(search.toLowerCase()))
    ) : data;
    if (sort) d = [...d].sort((a, b) => {
      const va = a[sort.key], vb = b[sort.key];
      return sort.dir === "asc" ? (va > vb ? 1 : -1) : (va < vb ? 1 : -1);
    });
    return d;
  }, [data, search, sort]);

  const paged = filtered.slice((page - 1) * pageSize, page * pageSize);
  const totalPages = Math.ceil(filtered.length / pageSize);

  return (
    <div className="w-full">
      {searchable && (
        <input className="mb-4 w-full border px-3 py-2 rounded"
          placeholder="Search..." value={search} onChange={e => { setSearch(e.target.value); setPage(1); }} />
      )}
      <table className="w-full border-collapse">
        <thead><tr>{columns.map(col => (
          <th key={String(col.key)} className="border px-4 py-2 bg-gray-100 cursor-pointer"
            onClick={() => col.sortable && setSort(s =>
              s?.key === col.key ? { key: col.key, dir: s.dir === "asc" ? "desc" : "asc" } : { key: col.key, dir: "asc" }
            )}>
            {col.label} {sort?.key === col.key ? (sort.dir === "asc" ? "↑" : "↓") : ""}
          </th>
        ))}</tr></thead>
        <tbody>{paged.map(row => (
          <tr key={row.id}>{columns.map(col => (
            <td key={String(col.key)} className="border px-4 py-2">
              {col.render ? col.render(row[col.key], row) : String(row[col.key])}
            </td>
          ))}</tr>
        ))}</tbody>
      </table>
      <div className="flex gap-2 mt-4 justify-end">
        {Array.from({ length: totalPages }, (_, i) => (
          <button key={i} onClick={() => setPage(i + 1)}
            className={`px-3 py-1 rounded ${page === i + 1 ? "bg-blue-500 text-white" : "bg-gray-200"}`}>
            {i + 1}
          </button>
        ))}
      </div>
    </div>
  );
}
export default DataTable;
