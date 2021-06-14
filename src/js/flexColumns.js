const flexibleColumns = () => {
  let flexibleCols = document.querySelectorAll('.flex-col');
  flexibleCols = [...flexibleCols];

  const emptyCols = flexibleCols.filter((col) => col.childNodes.length === 0);

  emptyCols.forEach((col) => {
    col.classList.add('empty-column');
  });
};

export default flexibleColumns;
