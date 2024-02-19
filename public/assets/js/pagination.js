const generatePagination = (currentPage, totalPages) => {
    const htmlTemplate = `
    <div class="paging_simple_numbers" style="float:right;">
        <ul class="pagination mg-0">
            $paginationItems
        </ul>
    </div>`;
    const emptyPaginationItemsHTML = `
    <li class="paginate_button page-item previous disabled"><a href="javascript:void(0)" aria-controls="products-table"
            data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
    <li class="paginate_button page-item next disabled"><a href="javascript:void(0)" aria-controls="products-table"
            data-dt-idx="1" tabindex="0" class="page-link">Next</a></li>`;
    if (totalPages == 0) {
        return htmlTemplate.replaceAll('$paginationItems', emptyPaginationItemsHTML);
    }

    let leftPart = [];
    let rightPart = [];
    let prevDisabled = currentPage == 1;
    let nextDisabled = currentPage == totalPages;

    if (currentPage >= 5 && currentPage <= totalPages - 4) {
        leftPart = [1, '...', currentPage - 1];
        rightPart = [currentPage + 1, '...', totalPages];
    }
    else if (currentPage >= 5) {
        leftPart = [1, '...', currentPage - 1];
        for (let i = currentPage + 1; i <= totalPages; ++i) {
            rightPart.push(i);
        }
    }
    else if (currentPage <= totalPages - 4) {
        for (let i = 1; i <= currentPage - 1; ++i) {
            leftPart.push(i);
        }
        rightPart = [currentPage + 1, '...', totalPages];
    }
    else {
        for (let i = 1; i <= currentPage - 1; ++i) {
            leftPart.push(i);
        }
        for (let i = currentPage + 1; i <= totalPages; ++i) {
            rightPart.push(i);
        }
    }

    let paginationItemsHTML = ``;
    let dataIndex = 0;
    paginationItemsHTML += `
        <li class="paginate_button page-item previous ${prevDisabled ? 'disabled' : ''}">
            <a href="javascript:void(0)" aria-controls="products-table" data-dt-idx="${dataIndex}" tabindex="0" class="page-link">Previous</a>
        </li>`;
    dataIndex++;
    for (let pageNumber of leftPart) {
        paginationItemsHTML += `
            <li class="paginate_button page-item ${pageNumber == '...' ? 'disabled' : ''}">
                <a href="javascript:void(0)" aria-controls="products-table" data-dt-idx="${dataIndex}" tabindex="0" class="page-link">${pageNumber}</a>
            </li>`;
        dataIndex++;
    }
    paginationItemsHTML += `
        <li class="paginate_button page-item active">
            <a href="javascript:void(0)" aria-controls="products-table" data-dt-idx="${dataIndex}" tabindex="0" class="page-link">${currentPage}</a>
        </li>`;
    dataIndex++;
    for (let pageNumber of rightPart) {
        paginationItemsHTML += `
            <li class="paginate_button page-item ${pageNumber == '...' ? 'disabled' : ''}">
                <a href="javascript:void(0)" aria-controls="products-table" data-dt-idx="${dataIndex}" tabindex="0" class="page-link">${pageNumber}</a>
            </li>`;
        dataIndex++;
    }
    paginationItemsHTML += `
        <li class="paginate_button page-item next ${nextDisabled ? 'disabled' : ''}">
            <a href="javascript:void(0)" aria-controls="products-table" data-dt-idx="${dataIndex}" tabindex="0" class="page-link">Next</a>
        </li>`;
    dataIndex++;

    // console.log(leftPart, rightPart);
    return htmlTemplate.replaceAll('$paginationItems', paginationItemsHTML);
};